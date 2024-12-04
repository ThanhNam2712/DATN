<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderControllerClient extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $orders = Order::where('user_id', Auth::id())
            ->where('orders.barcode', 'like', '%'. $search . '%')->get();

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

}
