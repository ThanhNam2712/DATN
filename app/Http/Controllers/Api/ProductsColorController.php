<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class ProductsColorController extends Controller
{
    public function index()
    {
        $color = ProductColor::all();
        return response()->json([
            'message' => 'Success',
            'data' => $color,
            'status_code' => '200'
        ], 200);
    }
}
