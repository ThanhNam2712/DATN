<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientCartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetail:cart_id,id,product_id,product_variant_id,color_id,size_id,quantity')
            ->first();
        return view('client.cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        // lấy id người dùng
        $id_user = Auth::id();

        // Kiểm Tra người dùng đã có giỏ hàng chưa
        $cart = Cart::where('user_id', $id_user)->first();
        // lấy id của product
        $product = $request->product_id;

        // lấy biến thể của product
        $product_variant = ProductVariant::where('product_id', $product)->first();
        // dd($request->size_id,$request->color_id,$product,$request->quantity);

        // kiểm tra nếu người dùng chưa có giỏ hàng thì thêm
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => $id_user,
                'total_amuont' => 0,
            ]);
        }

        // lấy cart item theo id Cart
        $cart_item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product)
            ->where('product_variant_id', $product_variant->id)
            ->where('quantity', $request->quantity)
            ->first();

        // nếu trong giỏ hàng đã có cart item sẽ công thêm số lượng người dùng chọn
        if ($cart_item) {
            $cart_item->update([
                'quantity' => $cart_item->quantity + $request->quantity
            ]);
        } else {
            // nếu chưa có thì sẽ tạo cart item mới, với dữ liệu người dùng nhập
            CartItem::create([
                'cart_id' => $cart->id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'product_id' => $product,
                'product_variant_id' => $product_variant->id,
                'quantity' => $request->quantity,
            ]);
        }

        // tính tổng tiền của giỏ hàng cart
        $cart->total_amuont += $product_variant->price_sale * $request->quantity;
        $cart->save();

        // trả về thông báo
        return redirect()->back()->with([
            'message' => 'Add Cart Success'
        ]);
    }


    public function updateCart(Request $request, $id)
    {
        if ($request->ajax()) {
            // kiểm tra cart item cập nhật
            $cartItem = CartItem::find($id);

            // tính giá tiền cũ của cart item
            $oldTotalDetail = $cartItem->quantity * $cartItem->product_variant->price_sale;
            $cartItem->quantity = $request->quantity;
            $cartItem->save();

            $sumQuantity = $cartItem->sum('quantity');
            // tính tiền giá mới
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
        if ($request->ajax()) {
            $cartDetail = CartItem::find($id);
            $cartID = $cartDetail->cart_id;
            $cart = Cart::find($cartID);
            $cartDetail->delete();

            $sumQuantity = $cartDetail->sum('quantity');
            $remainingCartItems = $cart->cartDetail;
            $newTotalAmount = $remainingCartItems->sum(function ($cartItem) {
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
