<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Coupon_user;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\ProductVariant;
use App\Models\ShipmentOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Webhook;
use function Laravel\Prompts\alert;

class ClientOrderController extends Controller
{
    public function index()
    {

        $cart = Cart::where('user_id', Auth::id())
            ->with([
                'cartDetail' => function ($query) {
                    $query->with(['product' => function ($productQuery) {
                        $productQuery->withTrashed();
                    }, 'cart' ,'product_variant', 'color', 'size']);
                }
            ])
            ->first();
        $hasDeletedProduct = false;
        foreach ($cart->cartDetail as $detail) {
            if ($detail->product && $detail->product->trashed()) {
                $hasDeletedProduct = true;
                break;
            }
        }

        $user = auth()->user();
        $is_default = Address::where('user_id', $user->id);
        $address = $is_default->where('is_default', 1)->first();

        $usedCouponIds = Coupon_user::where('user_id', $user->id)->pluck('coupon_id');
        $coupons = Coupon::whereNotIn('id', $usedCouponIds)
            ->where('expiration_date', '>=', now())
            ->where(function ($query) use ($user) {
                $query->whereNull('user_id')
                    ->orWhere('user_id', $user->id);
            })
            ->get();

        return view('client.order.index', compact('cart', 'address', 'user', 'hasDeletedProduct', 'coupons'));
    }

    public function create(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with([
                'cartDetail' => function ($query) {
                    $query->with(['product' => function ($productQuery) {
                        $productQuery->withTrashed();
                    }, 'cart' ,'product_variant', 'color', 'size']);
                }
            ])
            ->first();
        $hasDeletedProduct = false;
        foreach ($cart->cartDetail as $detail) {
            if ($detail->product && $detail->product->trashed()) {
                $hasDeletedProduct = true;
                break;
            }
        }

        if (!$hasDeletedProduct){
            if ($request->input('payments') == 'Thanh Toán Khi Nhận Hàng'){

                $coupon = Coupon::where('code', $request->coupon)
                    ->where('start_end', '<=', now())
                    ->where('expiration_date', '>=', now())
                    ->where('number', '>', 0)
                    ->first();

                if (!$coupon){
                    return redirect()->back()->with([
                        'error' => 'Mã Giảm Giá không hợp lệ hoặc đã hết số lượng, vui lòng chọn mã khác.',
                    ]);
                }

                $order = $this->createOrder($request);

                Payment::create([
                    'order_id' => $order->id,
                    'payment_method' => $request->input('payments'),
                    'amount' => $order->total_amount,
                    'status' => 0,
                ]);

                return view('client.order.success', compact('order'));
            }
            elseif ($request->input('payments') == 'Thẻ Tín Dụng'){
                $coupon = Coupon::where('code', $request->coupon)
                    ->where('start_end', '<=', now())
                    ->where('expiration_date', '>=', now())
                    ->where('number', '>', 0)
                    ->first();

                if (!$coupon){
                    return redirect()->back()->with([
                        'error' => 'Mã Giảm Giá không hợp lệ hoặc đã hết số lượng, vui lòng chọn mã khác.',
                    ]);
                }
                Stripe::setApiKey(env('STRIPE_SECRET'));

                $orderSession = session([
                    'user_id' => Auth::id(),
                    'total_amount' => $request->total_amount,
                    'email' => $request->email,
                    'status' => 'pending',
                    'province' => $request->province,
                    'district' => $request->district,
                    'ward' => $request->ward,
                    'address_detail' => $request->address_detail,
                    'phone_number' => $request->phone_number,
                    'coupon' => $request->coupon,
                ]);
                $session = \Stripe\Checkout\Session::create([
                    'customer_email' => Auth::user()->email,
                    'line_items'  => [
                        [
                            'price_data' => [
                                'currency'     => 'VND',
                                'product_data' => [
                                    "name" => Auth::user()->name,
                                    "description" => "Price: " . number_format($request->total_amount) . " VND Quantity :" . $request->allQuantity
                                ],
                                'unit_amount'  => ceil($request->total_amount),

                            ],
                            'quantity'   => 1,
                        ],
                    ],
                    'mode'        => 'payment',
                    'success_url' => url('client/order/confirm/?session_id={CHECKOUT_SESSION_ID}'),
                    'cancel_url'  => url('client/order/'),
                ]);
                return redirect()->away($session->url);
            }
        }else{
            return back()->with([
                'error' => 'Đã Có lỗi sảy ra vui lòng thử lại',
            ]);
        }

    }

    private function createOrder(Request $request)
    {
        $data = [
            'user_id' => Auth::id(),
            'total_amount' => $request->total_amount,
            'email' => $request->email,
            'status' => 'pending',
            'province' => $request->province,
            'district' => $request->district,
            'ward' => $request->ward,
            'address_detail' => $request->address_detail,
            'phone_number' => $request->phone_number,
            'coupon' => $request->coupon,
        ];

        $number = mt_rand(1000000000, 9999999999);
        $data['barcode'] = $number;
        if ($this->barcodeOrder($number)){
            $number = mt_rand(1000000000, 9999999999);
        }
        $order = Order::create($data);

        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetail:cart_id,id,product_id,product_variant_id,color_id,size_id,quantity')
            ->first();

        foreach ($cart->cartDetail as $key => $list){
            OrderItem::create([
                'order_id' => $order->id,
                'product_variant_id' => $list->product_variant_id,
                'quantity' => $list->quantity,
                'price' => $list->product_variant->price_sale,
                'color_id' => $list->color_id,
                'size_id' => $list->size_id,
                'product_id' => $list->product_id,
            ]);
            $productVariant = ProductVariant::find($list->product_variant_id);
            if ($productVariant) {
                $productVariant->decrement('quantity', $list->quantity);
            }
        }

        $coupon = Coupon::where('code', $order->coupon)
            ->where('start_end', '<=', now())
            ->where('expiration_date', '>=', now())
            ->where('number', '>', 0)
            ->first();

        if ($coupon){
            $couponUsed = Coupon_user::where('user_id', Auth::id())
                ->where('coupon_id', $coupon->id)
                ->first();
            if (!$couponUsed) {
                Coupon_user::create([
                    'user_id' => Auth::id(),
                    'coupon_id' => $coupon->id,
                ]);
            }
            $coupon->decrement('number', 1);
        }else{
            return redirect()->back()->with([
                'error' => 'Mã Giảm Giá Đã Hết Số Lượng, Vui Lòng Chọn Mã Khác',
            ]);
        }

        $total = $order->total_amount;

        $cart->cartDetail()->delete();
        $this->updateTotal($cart->id, 0);

        $this->sendMail($order, $total);
        ShipmentOrder::create([
            'order_id' => $order->id,
        ]);
        return $order;

    }

    public function confirm(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::retrieve($_GET['session_id']);
//        $order = Order::find($id);
        $paymentIntent = \Stripe\PaymentIntent::retrieve($session->payment_intent);
        $status = $paymentIntent->status;

        if ($status == 'succeeded'){
            $paymentMethodType = $paymentIntent->payment_method_types[0];

            $userId = session('user_id');
            $totalAmount = session('total_amount');
            $email = session('email');
            $status = 'pending';
            $province = session('province');
            $district = session('district');
            $ward = session('ward');
            $addressDetail = session('address_detail');
            $phoneNumber = session('phone_number');
            $coupon = session('coupon');

            $data = [
                'user_id' => $userId,
                'total_amount' => $totalAmount,
                'email' => $email,
                'status' => $status,
                'province' => $province,
                'district' => $district,
                'ward' => $ward,
                'address_detail' => $addressDetail,
                'phone_number' => $phoneNumber,
                'coupon' => $coupon,
            ];

            $number = mt_rand(1000000000, 9999999999);
            $data['barcode'] = $number;
            if ($this->barcodeOrder($number)) {
                $number = mt_rand(1000000000, 9999999999);
            }

            $order = Order::create($data);

            $cart = Cart::where('user_id', Auth::id())
                ->with('cartDetail:cart_id,id,product_id,product_variant_id,color_id,size_id,quantity')
                ->first();

            foreach ($cart->cartDetail as $key => $list){
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_variant_id' => $list->product_variant_id,
                    'quantity' => $list->quantity,
                    'price' => $list->product_variant->price_sale,
                    'color_id' => $list->color_id,
                    'size_id' => $list->size_id,
                    'product_id' => $list->product_id,
                ]);
                $productVariant = ProductVariant::find($list->product_variant_id);
                if ($productVariant) {
                    $productVariant->decrement('quantity', $list->quantity);
                }
            }

            $coupon = Coupon::where('code', $coupon)
                ->where('start_end', '<=', now())
                ->where('expiration_date', '>=', now())
                ->where('number', '>', 0)
                ->first();

            if ($coupon) {
                $couponUsed = Coupon_user::where('user_id', $userId)
                    ->where('coupon_id', $coupon->id)
                    ->first();

                if (!$couponUsed) {
                    Coupon_user::create([
                        'user_id' => $userId,
                        'coupon_id' => $coupon->id,
                    ]);
                }
                $coupon->decrement('number', 1);
            }else{
                return back()->with([
                    'error' => 'Mã Giảm Giá Đã Hết Số Lượng, Vui Lòng Chọn Mã Khác'
                ]);
            }

            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $paymentMethodType,
                'amount' => $order->total_amount,
                'status' => 1,
            ]);

            $total = $order->total_amount;

            $cart->cartDetail()->delete();
            $this->updateTotal($cart->id, 0);
            ShipmentOrder::create([
                'order_id' => $order->id,
            ]);
            $this->sendMail($order, $order->total_amount);
            session()->forget([
                'user_id',
                'total_amount',
                'email',
                'status',
                'province',
                'district',
                'ward',
                'address_detail',
                'phone_number',
                'coupon',
            ]);
            return view('client.order.success' ,compact('order'));
        }
        return view('client.order.confirm', compact('status'));
    }

    private function sendMail($order, $total){
        $email_to = $order->email;

        Mail::send('client.mail.send', compact('order', 'total'), function ($message) use ($email_to){
            $message->from('tuancdph43313@fpt.edu.vn', 'Tuan Clothing');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');
        });
    }

    public function coupon(Request $request)
    {
        $couponCode = $request->input('coupon');

        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetail:cart_id,id,product_id,product_variant_id,color_id,size_id,quantity')
            ->first();

        $coupon = Coupon::where('code', $couponCode)
            ->where('start_end', '<=', now())
            ->where('expiration_date', '>=', now())
            ->where('number', '>', 0)
            ->first();


        if (!$coupon) {
            return response()->json([
                'error' => 'coupon không hợp lệ'
            ]);
        }



        $discount = 0;
        $total = $cart->total_amuont;

        if ($total > $coupon->minimum_order_amount) {
            if ($coupon->discount_type == 'Phần Trăm') {
                $discount = $total * ($coupon->discount_value / 100);
            } elseif ($coupon->discount_type == 'Giá Tiền') {
                $discount = $coupon->discount_value;
            }
        } else {
            return response()->json([
                'error' => 'Số Tiền Không Phù Hợp Với Mã Giảm Giá, Vui Lòng Mua Thêm'
            ]);
        }

        if ($coupon->discount_value > $total){
            return response()->json([
                'error' => 'Coupon không phù hợp với giá tiền, Vui lòng Mua Thêm'
            ]);
        }
        $couponUsed = Coupon_user::where('user_id', Auth::id())
            ->where('coupon_id', $coupon->id)
            ->first();


        if ($couponUsed) {
            return response()->json([
                'error' => 'Mã giảm giá đã được sử dụng trước đó, Vui Lòng Chọn Mã Khác'
            ]);
        }

        $final_total = $total - $discount;

        return response()->json([
            'success' => true,
            'discount' => $discount,
            'final_total' => $final_total,
        ]);
    }

    private function updateTotal($id, $amount)
    {
        $cart = Cart::find($id);
        if ($cart){
            $cart->total_amuont = $amount;
            $cart->save();
        }
    }

    private function barcodeOrder($number)
    {
        return Order::where('barcode', $number)->exists();
    }
}
