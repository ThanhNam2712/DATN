<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use App\Models\ShipmentOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        return view('admin.orders.detail', compact('order'));
    }

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
}
