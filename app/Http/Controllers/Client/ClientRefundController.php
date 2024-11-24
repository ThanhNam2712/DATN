<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Refund;
use Auth;
use Illuminate\Http\Request;

class ClientRefundController extends Controller
{
    public function create($order_id)
    {
        $order = Order::findOrFail($order_id);
        if ($order->user_id != Auth::id()) {
            abort(403, 'Bạn không có quyền yêu cầu hoàn trả cho đơn hàng này.');
        }

        return view('client.refund.create', compact('order'));
    }

    public function store(Request $request, $order_id)
    {
        $request->validate([
            'reason' => 'required|string',
        ]);

        // Lấy đơn hàng
        $order = Order::findOrFail($order_id);

        // Kiểm tra xem đơn hàng có thuộc về người dùng hiện tại không
        if ($order->user_id != Auth::id()) {
            abort(403, 'Bạn không có quyền yêu cầu hoàn trả cho đơn hàng này.');
        }

        // Lấy tất cả các order_items liên quan đến đơn hàng
        $orderItems = $order->Order_Items;

        // Duyệt qua các order_items và tạo yêu cầu hoàn trả cho từng item
        foreach ($orderItems as $item) {
            Refund::create([
                'order_id' => $order->id,
                'user_id' => Auth::id(),
                'status' => 'pending',  // Trạng thái yêu cầu hoàn trả ban đầu
                'reason' => $request->reason,
                'refund_amount' => $item->price,  // Sử dụng giá của từng sản phẩm
            ]);
        }

        return redirect()->route('client.client.order.list')->with('success', 'Yêu cầu hoàn trả đã được gửi.');
    }


}
