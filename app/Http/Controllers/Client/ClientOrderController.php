<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ClientOrderController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetail:cart_id,id,product_id,product_variant_id,color_id,size_id,quantity')
            ->first();

        $user = auth()->user();
        $address = $user->addresses;
        return view('client.order.index', compact('cart', 'address', 'user'));
    }

    public function create(Request $request)
    {
        $data = [
            'user_id' => Auth::id(),
            'total_amount' => $request->total_amount,
            'email' => Auth::user()->email,
            'status' => 0,
            'payment_status' => 0,
        ];

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
//        $this->sendMail($order, $total);
        return view('client.order.confirm');
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
            ->with('cartDetail:cart_id,id,product_id,product_variant_id,quantity')
            ->first();

        $coupon = Coupon::where('code', $couponCode)
            ->where('start_end', '<=', now())
            ->where('expiration_date', '>=', now())
            ->first();

        if (!$coupon) {
            return response()->json([
                'error' => 'Thằng ranh này nhập không đúng mã voucher'
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
                'error' => 'Thằng ranh con này đơn hàng không đủ điều kiện'
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


}
