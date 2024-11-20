<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderControllerClient extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('client.list', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        $user = auth()->user();
        $address = $user->addresses;
        return view('client.order', compact('order', 'address'));
    }
}
