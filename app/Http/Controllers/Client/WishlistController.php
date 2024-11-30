<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function toggle($productId)
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)->where('product_id', $productId)->first();

        if ($wishlist) {
            $wishlist->delete();
            session()->flash('success', 'Đã xóa sản phẩm khỏi danh sách yêu thích.');
        } else {
            Wishlist::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
            session()->flash('success', 'Đã thêm sản phẩm vào danh sách yêu thích.');
        }
        return back();
    }

    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->paginate(5); // Load variants
        return view('client.wishlist.index', compact('wishlists'));
    }
}
