<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ReturnOrder;
use App\Models\ReturnOrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientRefundController extends Controller
{

    public function index($id)
    {
        $order = Order::find($id);
        return view('client.refund.create', compact('order'));
    }



    public function create(Request $request,$id)
    {
        $date = Carbon::now();
        $order = Order::find($id);
        $return = ReturnOrder::where('order_id', $order->id)->first();
        $user = Auth::id();

        if (!$return){
            $data =[
                'order_id' => $order->id,
                'reason' => $request->reason,
                'refund_amount' => 0,
                'request_date' => $date,
                'processed_by' => $user,
            ];

            $return = ReturnOrder::create($data);
        }
        $orderItem = OrderItem::find($request->orderItem);
        $coupon = Coupon::where('code', $order->coupon)->first();
        $discountedPrice = $orderItem->price;
        if ($coupon && $coupon->discount_value) {
            if ($coupon->discount_value == 'Phần Trăm'){
                $discountedPrice = $orderItem->price * (1 - $coupon->discount_value / 100);
            }else{
                $discountedPrice = max(0, $orderItem->price - $coupon->discount_value);
            }
        }else{
            $discountedPrice = $orderItem->price;
        }


        $dataItem = [
            'return_order_id' => $return->id,
            'return_product_id' => $orderItem->product_id,
            'product_variant_id' => $orderItem->product_variant_id,
            'color' => $orderItem->color_id,
            'size' => $orderItem->size_id,
            'quantity' => $orderItem->quantity,
            'price' => $orderItem->price,
        ];

        $returnItem = ReturnOrderItem::create($dataItem);

        $return['refund_amount'] += $discountedPrice;
        $return->save();

        return back()->with([
            'message' => 'Hoàn Trả Thành Công Vui Lòng Đợi'
        ]);
    }


    public function update(Request $request,$id)
    {
        $returnOrder = ReturnOrder::find($id);
        $returnOrderItem = ReturnOrderItem::where('return_order_id', $returnOrder->id)->first();
        $data['reason'] = $request->reason;
        $data['status'] = 'Special Request';
        $dataItem['reason_item'] = $request->reason_item;
        $returnOrder->update($data);
        $returnOrderItem->update($dataItem);
        return back()->with([
            'message' => 'Yêu Cầu Thành Công',
        ]);
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
