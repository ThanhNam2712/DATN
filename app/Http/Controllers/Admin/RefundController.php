<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Refund;
use App\Models\ReturnOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class RefundController extends Controller
{
    public function index()
    {
        $refunds = ReturnOrder::where('status', 'Special Request')->get();
        return view('admin.refund.index', compact('refunds'));
    }

    public function show($id)
    {
        $refund = ReturnOrder::find($id);
        return view('admin.refund.show', compact('refund'));
    }

    public function update(Request $request, $id)
    {
        $refund = ReturnOrder::find($id);
        $date = Carbon::now();
        $refund->update([
            'status' => 'Đã Tiếp Nhận',
            'processed_date' => $date,
        ]);

        return back()->with('success', 'Đã Tiếp Nhận Đơn Thành Công.');
    }

    public function checkOut(Request $request, $id)
    {
        $refund = ReturnOrder::find($id);
        $order = Order::where('id', $refund->order_id)->first();
        if ($request->input('payments') == 'Hoàn Tiền Trực Tiếp'){
            $data['status'] = 'completed';
            $data['refund_method'] = $request->input('payments');
            $dataOrder['status'] = 'return order';
            $refund->update($data);
            $order->update($dataOrder);
            return back()->with('success', 'Hoan Thanh');
        }elseif($request->input('payments') == 'Thẻ Tín Dụng'){
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $session = \Stripe\Checkout\Session::create([
                'customer_email' => $refund->user->email,
                'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'VND',
                            'product_data' => [
                                "name" => $refund->returnDetaill->product->name,
                                "description" => "Giá Gốc: " . "$".$refund->returnDetaill->variantPro->price_sale,
                            ],
                            'unit_amount'  => $refund->refund_amount * 25397,

                        ],
                        'quantity'   => 1,
                    ],
                ],
                'mode'        => 'payment',
                'success_url' => url('admin/refund/confirm/'. $order->id. '?session_id={CHECKOUT_SESSION_ID}'),
                'cancel_url'  => url('admin/refund/'. $refund->id),
            ]);
            return redirect()->away($session->url);
        }
    }

    public function confirm($id)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::retrieve($_GET['session_id']);
        $order = Order::find($id);
        $paymentIntent = \Stripe\PaymentIntent::retrieve($session->payment_intent);
        $status = $paymentIntent->status;

        $refund = ReturnOrder::where('order_id', $order->id)->first();
        $refunds = ReturnOrder::where('status', 'Special Request')->get();
        if ($status == 'succeeded'){
            $paymentMethodType = $paymentIntent->payment_method_types[0];
            $order->update([
                'status' => 'return order',
            ]);
            $refund->update([
                'status' => 'completed',
                'refund_method' => $paymentMethodType,
            ]);
            return view('admin.refund.index' ,compact('refunds'));
        }
        return view('admin.order.confirm', compact('order'));
    }
}
