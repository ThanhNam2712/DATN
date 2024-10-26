<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;

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


}
