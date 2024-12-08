<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductsSizeController extends Controller
{
    public function index()
    {
        $size = ProductSize::all();
        return response()->json([
            'message' => 'Success',
            'data' => $size,
            'status_code' => '200'
        ], 200);
    }
}
