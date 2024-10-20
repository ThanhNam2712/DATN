<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $colorClasses = [
            'Xanh Dương' => 'border-sky-500',
            'Đỏ' => 'bg-red-500',
            'Cam' => 'bg-orange-500',
            'Nâu' => 'bg-green-500',
            'Xanh Nước Biển' => 'bg-purple-500',
            'Vàng' => 'bg-yellow-500',
            'Xám' => 'border-slate-500',
            'Đen' => 'bg-slate-900',
            'Trắng' => 'bg-slate-200',
            'Hồng' => 'bg-pink-500',
        ];
        $product = Product::all();
        return view('admin.cart.index', compact('product', 'colorClasses'));
    }

    public function create(Request $request)
    {
        $id_user = Auth::id();
        $cart = Cart::where('user_id' , $id_user)->first();
        $product = $request->product_id;
        $product_variant = ProductVariant::where('product_id', $product)->first();
        if (!$cart){
            $cart = Cart::create([
                'user_id' => $id_user,
                'total_amuont' => 0,
            ]);
        }

        $cart_item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product)
            ->where('product_variant_id', $product_variant->id)
            ->where('quantity', $request->quantity)
            ->first();

        if ($cart_item){
            $cart_item->update([
                'quantity' => $cart_item->quantity + $request->quantity
            ]);
        }else{
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product,
                'product_variant_id' => $product_variant->id,
                'quantity' => $request->quantity,
            ]);
        }

        $cart->total_amuont += $product_variant->price_sale * $request->quantity;
        $cart->save();

        return redirect()->back()->with([
            'message' => 'Add Cart Success'
        ]);
    }

    public function detail()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetail:cart_id,id,product_id,product_variant_id,quantity')
            ->first();

        return view('admin.cart.show', compact('cart'));
    }

    public function updateCart(Request $request, $id)
    {
        if ($request->ajax()) {
            $cartItem = CartItem::find($id);

            $oldTotalDetail = $cartItem->quantity * $cartItem->product_variant->price_sale;
            $cartItem->quantity = $request->quantity;
            $cartItem->save();

            $sumQuantity = $cartItem->sum('quantity');
            $newTotalDetail = $cartItem->quantity * $cartItem->product_variant->price_sale;
            $cart = Cart::find($cartItem->cart_id);
            $cart->total_amuont = $cart->total_amuont - $oldTotalDetail + $newTotalDetail;
            $cart->save();

            return response()->json([
                'total_amuont' => $cart->total_amuont,
                'totalResponse' => $newTotalDetail,
                'sumQuantity' => $sumQuantity,
                'message' => 'Update Cart Success!'
            ]);
        }

        return response()->json(['message' => 'lỗi hahahaah'], 400);
    }

    public function deleteCart(Request $request, $id)
    {
        if ($request->ajax()){
            $cartDetail = CartItem::find($id);
            $cartID = $cartDetail->cart_id;
            $cart = Cart::find($cartID);
            $cartDetail->delete();

            $sumQuantity = $cartDetail->sum('quantity');
            $remainingCartItems = $cart->cartDetail;
            $newTotalAmount = $remainingCartItems->sum(function ($cartItem){
                return $cartItem->quantity * $cartItem->product_variant->price_sale;
            });

            $cart->update([
                'total_amuont' => $newTotalAmount
            ]);

            return response()->json([
                'total_amuont' => $newTotalAmount,
                'sumQuantity' => $sumQuantity,
                'message' => 'Update Cart Success!'
            ]);
        }
        return response()->json(['message' => 'Invalid request'], 400);
    }
}
