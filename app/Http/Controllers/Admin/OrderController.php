<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetail:cart_id,id,product_id,product_variant_id,quantity')
            ->first();
        $totalAmount = 0;

        // dd($cart);

        return view('admin.orders.create', compact('cart'));
    }
    public function create()
    {
        // Lấy giỏ hàng của người dùng hiện tại
        $cart = Cart::where('user_id', auth()->id())->first();
        // dd($cart);
        // Kiểm tra xem giỏ hàng có tồn tại không
        if (!$cart) {
            return response()->json(['message' => 'Giỏ hàng trống!'], 404);
        }
        $cartItems = $cart->cartDetail;
        // dd($cart->cartDetail);
        if (!$cartItems || $cartItems->isEmpty()) {
            return response()->json(['message' => 'Giỏ hàng không có sản phẩm!'], 404);
        }
        // Tính tổng tiền từ các mục trong giỏ

        $totalAmount = $cartItems->sum(function ($cartItem) {
            // dd($cartItem->product_variant);
            return $cartItem->quantity * $cartItem->product_variant->price_sale;
        });
        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $totalAmount,
            'status' => 0, // 0: chưa giao hàng
            'payment_status' => 0, // 0: chưa thanh toán
        ]);
        // Lưu từng mục trong giỏ hàng vào order_items
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_variant_id' => $cartItem->product_variant_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product_variant->price_sale,
            ]);
        }
        $cart->cartDetail()->delete(); // Xóa các mục trong giỏ hàng trước
        $cart->delete(); // Sau đó xóa giỏ hàng

        return response()->json(['message' => 'Đơn hàng được tạo thành công!', 'order' => $order]);

    }
    public function listOrders()
    {
        $orders = auth()->user()->Orders()->with('Order_Items.product_variants')->get();
        // dd($orders);
        return view('admin.orders.list', compact('orders'));
        
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

        if (!$coupon){
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
}
