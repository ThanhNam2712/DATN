<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Coupon_user;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Payment;
use App\Models\ProductVariant;
use App\Models\ShipmentOrder;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Webhook;
use function Laravel\Prompts\alert;

class ClientOrderController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $selectedProducts = session('selected_carts', []);
        if (empty($selectedProducts)) {
            return redirect()->back()->with('error', 'Vui lòng chọn ít nhất một sản phẩm để thanh toán.');
        }
        $cartDetails = CartItem::whereHas('cart', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->whereIn('id', $selectedProducts)
            ->with([
                'product' => function ($productQuery) {
                    $productQuery->withTrashed();
                },
                'product_variant',
                'color',
                'size',
            ])
            ->get();

        $hasDeletedProduct = $cartDetails->contains(function ($detail) {
            return $detail->product && $detail->product->trashed();
        });

        $address = Address::where('user_id', $user->id)
            ->where('is_default', 1)
            ->first();

        $usedCouponIds = Coupon_user::where('user_id', $user->id)->pluck('coupon_id');
        $coupons = Coupon::whereNotIn('id', $usedCouponIds)
            ->where('expiration_date', '>=', now())
            ->where('number', '>', 0)
            ->where(function ($query) use ($user) {
                $query->whereNull('user_id')
                    ->orWhere('user_id', $user->id);
            })
            ->get();
        $totalAmount = $cartDetails->sum(function ($detail) {
            return $detail->product_variant->price_sale * $detail->quantity;
        });
        return view('client.order.index', compact('cartDetails', 'address', 'user',
            'hasDeletedProduct', 'coupons', 'totalAmount'));
    }

    public function checkBox(Request $request)
    {

        $selectedCarts = $request->input('selected_carts', []);
        if (empty($selectedCarts)) {
            return response()->json(['success' => false, 'message' => 'Vui lòng chọn ít nhất một sản phẩm.']);
        }
        session(['selected_carts' => $selectedCarts]);
        return response()->json(['success' => true, 'message' => 'Sản phẩm đã được lưu vào Đơn Hàng.']);
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
                $order = $this->createOrder($request);
                if ($order instanceof \Illuminate\Http\RedirectResponse) {
                    return $order;
                }
                if ($order){
                    Payment::create([
                        'order_id' => $order->id,
                        'payment_method' => $request->input('payments'),
                        'amount' => $order->total_amount,
                        'status' => 0,
                    ]);
                    return view('client.order.success', compact('order'));
                }else{
                    return redirect()->back()->with('error', 'Đã có lỗi xảy ra khi tạo đơn hàng.');
                }

            }
            elseif ($request->input('payments') == 'Thẻ Tín Dụng'){
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
            'email' => Auth::user()->email,
            'status' => 0,
            'payment_status' => 0,
        ];
        $coupon = Coupon::where('code', $data['coupon'])
            ->where('start_end', '<=', now())
            ->where('expiration_date', '>=', now())
            ->first();

        if ($coupon){
            if ($coupon->number <= 0){
                return redirect()->back()->with('error', 'Mã Đã Hết số lượng vui lòng chọn mã khác');
            }
            $couponUsed = Coupon_user::where('user_id', Auth::id())
                ->where('coupon_id', $coupon->id)
                ->first();

            if (!$couponUsed) {
                Coupon_user::create([
                    'user_id' => Auth::id(),
                    'coupon_id' => $coupon->id,
                ]);
                $coupon->decrement('number', 1);
            }
        }
        $number = mt_rand(1000000000, 9999999999);
        $data['barcode'] = $number;
        if ($this->barcodeOrder($number)){
            $number = mt_rand(1000000000, 9999999999);
        }
        $order = Order::create($data);

        $selectedProducts = session('selected_carts', []);
        if (empty($selectedProducts)) {
            return redirect()->back()->with('error', 'Vui lòng chọn ít nhất một sản phẩm để thanh toán.');
        }

        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetail:cart_id,id,product_id,product_variant_id,color_id,size_id,quantity')
            ->first();
        $totalAmount = 0;
        foreach ($cart->cartDetail as $key => $list){
            if (in_array($list->id, $selectedProducts)) {
                $productVariant = ProductVariant::find($list->product_variant_id);
                if ($productVariant && $productVariant->quantity < $list->quantity) {
                    return redirect()->back()->with('error', 'Sản phẩm ' . $list->product->name . ' không đủ số lượng để đặt hàng.');
                }
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
                $totalAmount += $list->product_variant->price_sale * $list->quantity;
            }
        }


        $total = $order->total_amount;
        foreach ($selectedProducts as $selectedProductId) {
            $cart->cartDetail()->where('id', $selectedProductId)->delete();
        }
        $totalAmountRemaining = $cart->total_amuont - $totalAmount;
        $this->updateTotal($cart->id, $totalAmountRemaining);

        $this->sendMail($order, $total);
        ShipmentOrder::create([
            'order_id' => $order->id,
        ]);
        session()->forget('selected_carts');
        return $order;
    }

    public function confirm(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::retrieve($_GET['session_id']);
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
            $coupon = Coupon::where('code', $data['coupon'])
                ->where('start_end', '<=', now())
                ->where('expiration_date', '>=', now())
                ->first();

            if ($coupon){
                if ($coupon->number <= 0){
                    return redirect()->back()->with('error', 'Mã Đã Hết số lượng vui lòng chọn mã khác');
                }
                $couponUsed = Coupon_user::where('user_id', Auth::id())
                    ->where('coupon_id', $coupon->id)
                    ->first();

                if (!$couponUsed) {
                    Coupon_user::create([
                        'user_id' => Auth::id(),
                        'coupon_id' => $coupon->id,
                    ]);
                    $coupon->decrement('number', 1);
                }
            }
            $number = mt_rand(1000000000, 9999999999);
            $data['barcode'] = $number;
            if ($this->barcodeOrder($number)) {
                $number = mt_rand(1000000000, 9999999999);
            }

            $order = Order::create($data);

            $selectedProducts = session('selected_carts', []);
            if (empty($selectedProducts)) {
                return redirect()->back()->with('error', 'Vui lòng chọn ít nhất một sản phẩm để thanh toán.');
            }

            $cart = Cart::where('user_id', Auth::id())
                ->with('cartDetail:cart_id,id,product_id,product_variant_id,color_id,size_id,quantity')
                ->first();

            $totalAmount = 0;

            foreach ($cart->cartDetail as $key => $list){
                if (in_array($list->id, $selectedProducts)) {
                    $productVariant = ProductVariant::find($list->product_variant_id);
                    if ($productVariant && $productVariant->quantity < $list->quantity) {
                        return redirect()->back()->with('error', 'Sản phẩm ' . $list->product->name . ' không đủ số lượng để đặt hàng.');
                    }
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
                    $totalAmount += $list->product_variant->price_sale * $list->quantity;
                }
            }


            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $paymentMethodType,
                'amount' => $order->total_amount,
                'status' => 1,
            ]);

            $total = $order->total_amount;

            foreach ($selectedProducts as $selectedProductId) {
                $cart->cartDetail()->where('id', $selectedProductId)->delete();
            }
            $totalAmountRemaining = $cart->total_amuont - $totalAmount;
            $this->updateTotal($cart->id, $totalAmountRemaining);
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
            session()->forget('selected_carts');
            return view('client.order.success' ,compact('order'));
        }
    }

    public function vnPayCheck(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetail:cart_id,id,product_id,product_variant_id,color_id,size_id,quantity')
            ->first();
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef');
        $vnp_Amount = $request->get('vnp_Amount');

        if ($vnp_ResponseCode != null) {
            if ($vnp_ResponseCode == 00) {
                $cart->cartDetail()->delete();
                return view('client.order.confirm')->with([
                    'message' => 'Order Success ! You will pay on delivery. Please check email'
                ]);
            } else {
                Order::delete($vnp_TxnRef);
                return view('client.order.confirm')->with([
                    'message' => 'Order Fail !'
                ]);
            }
        }
    }

    private function sendMail($order, $total)
    {
        $email_to = $order->email;

        Mail::send('client.mail.send', compact('order', 'total'), function ($message) use ($email_to) {
            $message->from('tuancdph43313@fpt.edu.vn', 'Tuan Clothing');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');
        });
    }

    public function coupon(Request $request)
    {
        $couponCode = $request->input('coupon');
        $user = auth()->user();
        $selectedProducts = session('selected_carts', []);

        $cartDetails = CartItem::whereHas('cart', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->whereIn('id', $selectedProducts)
            ->with([
                'product' => function ($productQuery) {
                    $productQuery->withTrashed();
                },
                'product_variant',
                'color',
                'size',
            ])
            ->get();



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


        $totalAmount = $cartDetails->sum(function ($detail) {
            return $detail->product_variant->price_sale * $detail->quantity;
        });
        $discount = 0;
        $total = $totalAmount;

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
                'error' => 'Mã giảm giá đã được sử dụng trước đó'
            ]);
        } else {
            Coupon_user::create([
                'user_id' => Auth::id(),
                'coupon_id' => $coupon->id,
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

    private function updateTotal($id, $totalAmount)
    {
        $cart = Cart::find($id);
        if ($cart){
            $cart->total_amuont = $totalAmount;
            $cart->save();
        }
    }


}
