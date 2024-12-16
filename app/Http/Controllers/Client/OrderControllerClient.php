<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use App\Models\ShipmentOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderControllerClient extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $orders = Order::where('user_id', Auth::id())
                        ->where('orders.barcode', 'like', '%'. $search . '%')
                        ->orderBy('id', 'desc')
                        ->paginate(5);
        return view('client.order.list', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        $user = auth()->user();
        $is_default = Address::where('user_id', $user->id);
        $address = $is_default->where('is_default', 1)->first();
        return view('client.order.show', compact('order', 'address', 'user'));
    }
    public function listOrders()
    {
        $orders = auth()->user()->Orders()->with('orderDetail.product_variants')->get();
        // dd($orders);
        return view('client.order.list', compact('orders'));

    }
    public function show($id)
    {
        $order = Order::where('user_id', auth()->id())
            ->with(['orderDetail.product_variants', 'user'])
            ->findOrFail($id);
            $user = auth()->user();
            $address = $user->addresses;
        return view('client.order.show', compact('order','user', 'address'));
    }


    public function submit($id)
    {
        $order = Order::find($id);
        $shipment = ShipmentOrder::where('order_id' ,$order->id)->first();

        if ($order->status != "completed" && $shipment->shipments_5 != "completed"){
            $order->status = 'completed';
            $shipment->shipments_5 = 'completed';
            $order->save();
            $shipment->save();
            return back()->with('message', 'Xác Nhận Thành Công');
        }else{
            return back()->with('message', 'Xác Nhận Thất Bại');
        }
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
            $orderItems = OrderItem::where('order_id', $order->id)->get();
            foreach ($orderItems as $item) {
                $productVariant = ProductVariant::find($item->product_variant_id);
                if ($productVariant) {
                    $productVariant->increment('quantity', $item->quantity);
                }
            }
            $order->status = 'cancelled';
            $shipment->cancel = $request->input('cancel_8');
            $order->save();
            $shipment->save();
            return back()->with('message', 'Hủy Đơn Hàng Thành Công');
        }else{
            return back()->with('error', 'Đơn Hàng Đang Được Giao Bạn Không Thể Hủy Đơn!');
        }
    }
}
