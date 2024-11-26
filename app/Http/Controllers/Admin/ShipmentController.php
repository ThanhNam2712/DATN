<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shipment;
use App\Models\ShipmentOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ShipmentController extends Controller
{
    public function index()
    {
        $orders = Order::whereDoesntHave('shipments')->where('status', '=', 'delivery person')->get();
        return view('admin.shipment.index', compact('orders'));
    }

    public function delivery()
    {
        $shipment = Shipment::where('shiper_id', Auth::id())->whereHas('order', function ($query) {
            $query->whereNotIn('status', ['cancelled', 'completed']);
        })->get();

        return view('admin.shipment.detail', compact('shipment'));
    }

    public function success()
    {
        $shipment = Shipment::where('shiper_id', Auth::id())->whereHas('order', function ($query) {
            $query->whereIn('status', ['Giao Thành công', 'completed']);
        })->get();

        return view('admin.shipment.success', compact('shipment'));
    }

    public function detail($id)
    {
        $shipment = Shipment::find($id);
        return view('admin.shipment.show', compact('shipment'));
    }

    public function postOrder(Request $request)
    {
        $data = $request->all();
        Shipment::create($data);

        $order = Order::find($request->order_id);


        $order->update([
            'status' => 'Đã Nhận Đơn',
        ]);

        return redirect()->back()->with([
            'message' => 'Vui Lòng Kiểm Tra Đơn Trong Phần Giao Hàng'
        ]);
    }

    public function update(Request $request, $id)
    {
        $now = Carbon::now();
        $order = Order::find($id);
        $shipment = ShipmentOrder::where('order_id' ,$order->id)->first();
        $payment = Payment::where('order_id' ,$order->id)->first();
        if ($order->status === 'Đã Nhận Đơn' && $shipment->shipments_1 === 'Chưa nhận đơn') {
            $shipment->shipments_1 = "Đã Nhận Đơn";
        }elseif ($shipment->shipments_1 === 'Đã Nhận Đơn' && $shipment->shipments_2 === 'Chưa xử lý'){
            $shipment->shipments_2 = "Bắt Đầu Giao Hàng";
            $order->status = "Bắt Đầu Giao Hàng";
        }elseif ($shipment->shipments_2 === 'Bắt Đầu Giao Hàng' && $shipment->shipments_3 === 'Chưa xử lý'){
            $shipment->shipments_3 = "Đã Đến Điểm Giao";
        }elseif ($shipment->shipments_3 === 'Đã Đến Điểm Giao' && $shipment->shipments_4 === 'Chưa xử lý'){
            $shipment->shipments_4 = "Giao Thành công";
            $order->status = "Giao Thành công";
            $order->confirmation_deadline = $now->addMinutes(1);
            $payment->status = '1';
        }
        $shipment->save();
        $order->save();
        $payment->save();
        return back()->with('message', 'Xác Nhận Đơn Thành Công');
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

    public function delete($id)
    {
        $shipment = Shipment::find($id);
        $order = Order::find($shipment->order_id);

        $shipment->delete();
        $order->update([
            'status' => 'delivery person',
        ]);
        return redirect()->back()->with([
            'message' => 'Delete Order Shipment'
        ]);
    }
}
