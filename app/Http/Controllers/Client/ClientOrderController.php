<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Webhook;

class ClientOrderController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetail:cart_id,id,product_id,product_variant_id,color_id,size_id,quantity')
            ->first();

        $user = auth()->user();
        $is_default = Address::where('user_id', $user->id);
        $address = $is_default->where('is_default', 1)->first();
        return view('client.order.index', compact('cart', 'address', 'user'));
    }

    public function create(Request $request)
    {

        if ($request->input('payments') == 'Thanh Toán Khi Nhận Hàng'){
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
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $data = [
                'user_id' => Auth::id(),
                'total_amount' => $request->total_amount,
                'email' => Auth::user()->email,
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
            $total = $order->total_amount;

            $cart->cartDetail()->delete();
            $this->updateTotal($cart->id, 0);
            ShipmentOrder::create([
                'order_id' => $order->id,
            ]);
            $session = \Stripe\Checkout\Session::create([
                'customer_email' => Auth::user()->email,
                'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'VND',
                            'product_data' => [
                                "name" => Auth::user()->name,
                                "description" => "Price: " . $request->total_amount . " USD Quantity :" . $request->allQuantity
                            ],
                            'unit_amount'  => $request->total_amount * 25397,

                        ],
                        'quantity'   => 1,
                    ],
                ],
                'mode'        => 'payment',
                'success_url' => url('client/order/confirm/'. $order->id. '?session_id={CHECKOUT_SESSION_ID}'),
                'cancel_url'  => url('client/order/'),
            ]);
            return redirect()->away($session->url);

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
        $total = $order->total_amount;

        $cart->cartDetail()->delete();
        $this->updateTotal($cart->id, 0);

        $this->sendMail($order, $total);
        ShipmentOrder::create([
            'order_id' => $order->id,
        ]);
        return $order;

    }

    public function confirm(Request $request, $id)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::retrieve($_GET['session_id']);
        $order = Order::find($id);
        $paymentIntent = \Stripe\PaymentIntent::retrieve($session->payment_intent);
        $status = $paymentIntent->status;

        if ($status == 'succeeded'){
            $paymentMethodType = $paymentIntent->payment_method_types[0];
            $order->update([
                'status' => 'pending',
            ]);

            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $paymentMethodType,
                'amount' => $order->total_amount,
                'status' => 1,
            ]);
            $this->sendMail($order, $order->total_amount);
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
                'error' => 'coupon không hợp lệ'
            ]);
        }

        $couponUsed = Coupon_user::where('user_id', Auth::id())
            ->where('coupon_id', $coupon->id)
            ->first();


        if ($couponUsed) {
            return response()->json([
                'error' => 'Mã giảm giá đã được sử dụng trước đó'
            ]);
        }else{
            Coupon_user::create([
                'user_id' => Auth::id(),
                'coupon_id' => $coupon->id,
            ]);
        }

        $final_total = $total - $discount;
        $coupon->decrement('number', 1);
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
    public function listOrders()
    {
        $orders = auth()->user()->Orders()->with('Order_Items.product_variants')->get();
        // dd($orders);
        return view('client.order.list', compact('orders'));

    }
    public function show($id)
    {
        $order = Order::where('user_id', auth()->id())
            ->with(['Order_Items.product_variants', 'user'])
            ->findOrFail($id);
            $user = auth()->user();
            $address = $user->addresses;
        return view('client.order.show', compact('order','user', 'address'));
    }

    private function barcodeOrder($number)
    {
        return Order::where('barcode', $number)->exists();
    }
}
