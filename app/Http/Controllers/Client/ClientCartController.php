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
            ->with([
                'cartDetail' => function ($query) {
                    $query->with(['product' => function ($productQuery) {
                        $productQuery->withTrashed();
                    }, 'cart' ,'product_variant', 'color', 'size']);
                }
            ])
            ->first();
        $hasDeletedProduct = false;
        foreach ($cart->cartDetail as $detail) {
            if ($detail->product && $detail->product->trashed()) {
                $hasDeletedProduct = true;
                break;
            }
        }
        return view('client.cart.index', compact('cart', 'hasDeletedProduct'));
    }

    public function add(Request $request)
    {
        // lấy id người dùng
        $id_user = Auth::id();


        $cart = Cart::where('user_id', $id_user)->first();

        $product = $request->product_id;

        $product_variant = ProductVariant::find($request->product_variant_id);

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
            ->where('color_id', $request->color_id)
            ->where('size_id', $request->size_id)
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
            'message' => 'Thêm Sản Phẩm Vào Giỏ Hàng Thành Công'
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
