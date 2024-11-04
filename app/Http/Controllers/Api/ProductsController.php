<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'message' => 'Success',
            'data' => $products,
            'status_code' => '200'
        ], 200);
    }


    public function cart($id)
    {
        $userId = User::find($id);
        $cart = Cart::where('user_id', $userId->id)
            ->with('cartDetail:cart_id,id,product_id,product_variant_id,quantity')
            ->first();

        return response()->json([
            'message' => 'Success',
            'data' => $cart,
            'status_code' => '200'
        ], 200);
    }

    public function coupon()
    {
        $coupon = Coupon::all();

        return response()->json([
            'message' => 'Success',
            'data' => $coupon,
            'status_code' => '200'
        ], 200);
    }

    public function variant($id)
    {
        $product = Product::find($id);

        $variant = ProductVariant::where('product_id', $product->id)->get();
        return response()->json([
            'message' => 'Success',
            'data' => $variant,
            'status_code' => '200'
        ], 200);
    }

}
