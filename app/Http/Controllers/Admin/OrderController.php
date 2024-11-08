<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetail:cart_id,id,product_id,product_variant_id,quantity')
            ->first();
        $totalAmount = 0;
        $user = auth()->user();
        $address = $user->addresses;

        // dd($address);

        return view('admin.orders.create', compact('cart', 'user', 'address'));
    }
    public function create(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                // Lấy giỏ hàng của người dùng hiện tại
                $cart = Cart::where('user_id', auth()->id())->first();
                if (!$cart) {
                    return response()->json(['message' => 'Giỏ hàng trống!'], 404);
                }
                $cartItems = $cart->cartDetail;
                if (!$cartItems || $cartItems->isEmpty()) {
                    return response()->json(['message' => 'Giỏ hàng không có sản phẩm!'], 404);
                }

                // Tính tổng tiền từ các mục trong giỏ
                $totalAmount = $cartItems->sum(function ($cartItem) {
                    return $cartItem->quantity * $cartItem->product_variant->price_sale;
                });
                // Lưu hoặc cập nhật thông tin địa chỉ
                $address = Address::updateOrCreate(
                    ['user_id' => auth()->id()],
                    [
                        'Province' => $request->Province ?? 'Giá trị mặc định', // Thay thế bằng giá trị mặc định
                        'district' => $request->district ?? 'Giá trị mặc định',
                        'Neighborhood' => $request->Neighborhood ?? 'Giá trị mặc định',
                        'Apartment' => $request->Apartment ?? 'Giá trị mặc định',
                        'status' => $request->status ?? 0,
                    ]
                );
                // dd($address);
                // Tạo đơn hàng
                $order = Order::create([
                    'user_id' => auth()->id(),
                    'total_amount' => $request->total_amount,
                    'status' => 0, // 0: chưa giao hàng
                    'payment_status' => 0, // 0: chưa thanh toán
                ]);

                // Lưu từng mục trong giỏ hàng vào order_items và trừ số lượng của biến thể
                foreach ($cartItems as $cartItem) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_variant_id' => $cartItem->product_variant_id,
                        'quantity' => $cartItem->quantity,
                        'price' => $cartItem->product_variant->price_sale,
                    ]);

                    // Cập nhật số lượng biến thể sản phẩm
                    $productVariant = ProductVariant::find($cartItem->product_variant_id);
                    if ($productVariant) {
                        $productVariant->decrement('quantity', $cartItem->quantity);
                    }
                }

                // Xóa các mục trong giỏ hàng
                $cart->cartDetail()->delete();
                $cart->delete();

                return response()->json(['message' => 'Đơn hàng được tạo thành công!', 'order' => $order]);
            });

        } catch (\Throwable $th) {
            dd($th->getMessage());
            return response()->json(['error' => 'Lỗi đặt hàng: ' . $th->getMessage()], 500);
        }
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
}
