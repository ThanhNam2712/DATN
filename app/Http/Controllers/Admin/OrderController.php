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
use function Laravel\Prompts\search;

class OrderController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->search;
        $orders = Order::select('orders.*')
                        ->join('users', 'orders.user_id', 'users.id')
                        ->where(function($check) use ($search) {
                            $check->where('orders.barcode', 'like', '%' . $search . '%')
                                ->orWhere('users.name', 'like', '%' . $search . '%')
                                ->orWhere('users.email', 'like', '%' . $search . '%');
                        })
                        ->whereIn('orders.status', ['pending', 'processing', 'delivery person'])
                        ->orderBy('orders.id', 'desc')
                        ->paginate(5);

        return view('admin.orders.index', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        return view('admin.orders.detail', compact('order'));
    }

    public function viewCompleted(Request $request)
    {
        $search = $request->search;
        $orders = Order::select('orders.*')
                        ->join('users', 'orders.user_id', 'users.id')
                        ->where(function($check) use ($search) {
                            $check->where('orders.barcode', 'like', '%' . $search . '%')
                                ->orWhere('users.name', 'like', '%' . $search . '%')
                                ->orWhere('users.email', 'like', '%' . $search . '%');
                        })
                        ->where('orders.status', 'completed')
                        ->orderBy('orders.id', 'desc')
                        ->paginate(5);
        $sumOrder = Order::where('status','completed')->sum('total_amount');
        return view('admin.orders.completed', compact('orders', 'sumOrder'));
    }


    public function cancelled()
    {
        $orders = Order::where('status', '=' , 'cancelled')
                        ->orderBy('id', 'desc')
                        ->paginate(4);
        return view('admin.orders.cancelled', compact('orders'));
    }

    public function shipmentCom(Request $request)
    {
        $search = $request->search;
        $orders = Order::select('orders.*')
            ->join('users', 'orders.user_id', 'users.id')
            ->where(function($check) use ($search) {
                $check->where('orders.barcode', 'like', '%' . $search . '%')
                    ->orWhere('users.name', 'like', '%' . $search . '%')
                    ->orWhere('users.email', 'like', '%' . $search . '%');
            })
            ->where('orders.status', 'Giao Thành công')
            ->orderBy('orders.id', 'desc')
            ->paginate(5);
        return view('admin.orders.shipmentComplate', compact('orders'));
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
        if ($order->status != "completed" && $shipment->shipments_5 != "completed" && $shipment->shipments_1 != "Đã Nhận Đơn"){
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
