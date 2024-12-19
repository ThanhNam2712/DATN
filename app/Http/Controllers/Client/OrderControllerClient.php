<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use App\Models\Review;
use App\Models\ShipmentOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    public function address($id)
    {
        $address = Address::find($id);

        if ($address){
            $address->update([
                'is_default' => '1'
            ]);
            Address::where('user_id', Auth::id())
                ->where('id', '!=', $id)
                ->update(['is_default' => 0]);
            return back()->with([
                'message' => 'Thay Đổi Địa Chỉ Thành Công',
            ]);
        }else{
            return back()->with([
                'message' => 'Thay Đổi Địa Chỉ không Thành Công',
            ]);
        }

    }

    public function download($barcode)
    {
        // Generate the QR code
        $qrCode = QrCode::size(200)->generate($barcode);

        // Create a temporary file to save the QR code
        $path = public_path('qr_codes');
        if (!file_exists($path)) {
            mkdir($path, 0777, true); // Create folder if it doesn't exist
        }

        $filename = 'qr_code_' . $barcode . '.png';
        $filePath = $path . '/' . $filename;

        // Save the QR code image to a file
        QrCode::format('png')->size(500)->backgroundColor(255, 255, 255)->color(0, 0, 0)->generate($barcode, $filePath);
        // Download the file
        return response()->download($filePath, $filename)->deleteFileAfterSend(true);
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

    public function postReview(Request $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();

        $order = Order::find($id);

        foreach ($order->orderDetail as $key => $list){
            $id_product = $list->product_id;
            $data['product_id'] = $id_product;
            Review::create($data);
        }

        return redirect()->back()->with([
            'message' => 'Đánh giá sản phẩm thành công!',
        ]);
    }
}
