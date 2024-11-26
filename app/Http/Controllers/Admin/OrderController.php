<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
<<<<<<< HEAD
=======
use App\Models\OrderItem;
use App\Models\ProductVariant;
use App\Models\ShipmentOrder;
>>>>>>> 32488c3c0171f99681826f3ff09d74f46448a395
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
<<<<<<< HEAD
        $orders = Order::with('user', 'Order_Items.color', 'Order_Items.size', 'Order_Items.product_variants')->get();

        return view('admin.order.index', compact('orders'));
=======
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
>>>>>>> 32488c3c0171f99681826f3ff09d74f46448a395
    }

    public function updateStatus(Request $request, $id)
{
    $orders = Order::findOrFail($id);
    $orders->status = $request->status;
    $orders->save();

<<<<<<< HEAD
    return redirect()->route('admin.orders.index')->with('success', 'Cập nhật trạng thái thành công.');
}






    //
    // public function index()
    // {
    //     $cart = Cart::where('user_id', Auth::id())
    //         ->with('cartDetail:cart_id,id,product_id,product_variant_id,quantity')
    //         ->first();
    //     $totalAmount = 0;
    //     $user = auth()->user();
    //     $address = $user->addresses;

    //     // dd($address);
    //     // return view('client.order');
    //     return view('client.order', compact('cart', 'user', 'address'));
    // }

    // public function detail($id)
    // {
    //     $order = Order::find($id);
    //     return view('admin.orders.detail', compact('order'));
    // }

    // public function create(Request $request)
    // {
    //     try {
    //         DB::transaction(function () use ($request) {
    //             // Lấy giỏ hàng của người dùng hiện tại
    //             $cart = Cart::where('user_id', auth()->id())->first();
    //             if (!$cart) {
    //                 return response()->json(['message' => 'Giỏ hàng trống!'], 404);
    //             }
    //             $cartItems = $cart->cartDetail;
    //             if (!$cartItems || $cartItems->isEmpty()) {
    //                 return response()->json(['message' => 'Giỏ hàng không có sản phẩm!'], 404);
    //             }

    //             // Tính tổng tiền từ các mục trong giỏ
    //             $totalAmount = $cartItems->sum(function ($cartItem) {
    //                 return $cartItem->quantity * $cartItem->product_variant->price_sale;
    //             });
    //             // Lưu hoặc cập nhật thông tin địa chỉ
    //             $address = Address::updateOrCreate(
    //                 ['user_id' => auth()->id()],
    //                 [
    //                     'Province' => $request->Province ?? 'Giá trị mặc định', // Thay thế bằng giá trị mặc định
    //                     'district' => $request->district ?? 'Giá trị mặc định',
    //                     'Neighborhood' => $request->Neighborhood ?? 'Giá trị mặc định',
    //                     'Apartment' => $request->Apartment ?? 'Giá trị mặc định',
    //                     'status' => $request->status ?? 0,
    //                 ]
    //             );
    //             // dd($address);
    //             // Tạo đơn hàng
    //             $order = Order::create([
    //                 'user_id' => auth()->id(),
    //                 'total_amount' => $request->total_amount,
    //                 'status' => 0, // 0: chưa giao hàng
    //                 'payment_status' => 0, // 0: chưa thanh toán
    //             ]);

    //             // Lưu từng mục trong giỏ hàng vào order_items và trừ số lượng của biến thể
    //             foreach ($cartItems as $cartItem) {
    //                 OrderItem::create([
    //                     'order_id' => $order->id,
    //                     'product_variant_id' => $cartItem->product_variant_id,
    //                     'quantity' => $cartItem->quantity,
    //                     'price' => $cartItem->product_variant->price_sale,
    //                 ]);

    //                 // Cập nhật số lượng biến thể sản phẩm
    //                 $productVariant = ProductVariant::find($cartItem->product_variant_id);
    //                 if ($productVariant) {
    //                     $productVariant->decrement('quantity', $cartItem->quantity);
    //                 }
    //             }

    //             // Xóa các mục trong giỏ hàng
    //             $cart->cartDetail()->delete();
    //             $cart->delete();

    //             return redirect()->route('admin.order.show', ['id' => $order->id])
    //             ->with('success', 'Đơn hàng được tạo thành công!');
    //         });

    //     } catch (\Throwable $th) {
    //         dd($th->getMessage());
    //         return response()->json(['error' => 'Lỗi đặt hàng: ' . $th->getMessage()], 500);
    //     }
    // }

    // public function listOrders()
    // {
    //     $orders = auth()->user()->Orders()->with('Order_Items.product_variants')->get();
    //     // dd($orders);
    //     return view('client.list', compact('orders'));

    // }
    // public function show($id)
    // {
    //     $order = Order::where('user_id', auth()->id())
    //         ->with(['Order_Items.product_variants', 'user'])
    //         ->findOrFail($id);
    //         $user = auth()->user();
    //         $address = $user->addresses;
    //     return view('client.chitietorder', compact('order','user', 'address'));
    // }


    // public function coupon(Request $request)
    // {
    //     $couponCode = $request->input('coupon');

    //     $cart = Cart::where('user_id', Auth::id())
    //         ->with('cartDetail:cart_id,id,product_id,product_variant_id,quantity')
    //         ->first();

    //     $coupon = Coupon::where('code', $couponCode)
    //         ->where('start_end', '<=', now())
    //         ->where('expiration_date', '>=', now())
    //         ->first();

    //     if (!$coupon) {
    //         return response()->json([
    //             'error' => 'Thằng ranh này nhập không đúng mã voucher'
    //         ]);
    //     }

    //     $discount = 0;
    //     $total = $cart->total_amuont;

    //     if ($total > $coupon->minimum_order_amount) {
    //         if ($coupon->discount_type == 'Phần Trăm') {
    //             $discount = $total * ($coupon->discount_value / 100);
    //         } elseif ($coupon->discount_type == 'Giá Tiền') {
    //             $discount = $coupon->discount_value;
    //         }
    //     } else {
    //         return response()->json([
    //             'error' => 'Thằng ranh con này đơn hàng không đủ điều kiện'
    //         ]);
    //     }
    //     $final_total = $total - $discount;
    //     return response()->json([
    //         'success' => true,
    //         'discount' => $discount,
    //         'final_total' => $final_total,
    //     ]);
    // }
=======
    public function updateStatus(Request $request, $id)
    {
        $orders = Order::findOrFail($id);
        $orders->status = $request->status;
        $orders->save();

        return redirect()->back()->with([
            'success' => 'Cập nhật trạng thái thành công.'
        ]);
    }

    public function cancel(Request $request,$id)
    {
        $request->validate([
            'cancel_8' => 'required|string|min:5',
        ], [
            'cancel_8.required' => 'Vui lòng nhập lý do hủy.',
            'cancel_8.min' => 'Lý do hủy phải có ít nhất 5 ký tự.'
        ]);

        $order = Order::find($id);
        $shipment = ShipmentOrder::where('order_id' ,$order->id)->first();
        if ($order->status != "completed" && $shipment->shipments_5 != "completed"){
            $order->status = 'cancelled';
            $shipment->cancel = $request->input('cancel_8');
            $order->save();
            $shipment->save();
            return back()->with('message', 'Hủy Đơn Thành Công');
        }else{
            return back()->with('message', 'Hủy Đơn Thất Bại');
        }
    }

    public function getById(Request $request)
    {
        $barcode = $request->get('barcode');
        $order = Order::where('barcode', $barcode)->first();
        if ($order){
            return response()->json([
                'success' => true,
                'id' => $order->id,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Thằng ranh lấy mã tài xỉu à',
            ]);
        }
    }
>>>>>>> 32488c3c0171f99681826f3ff09d74f46448a395
}
