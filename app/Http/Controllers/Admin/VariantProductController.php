<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class VariantProductController extends Controller
{
    public function index($id)
    {
        $product = Product::find($id);
        $color = ProductColor::all();
        $size = ProductSize::all();
        return view('admin.variant.index', compact('product', 'color', 'size'));
    }

    public function create(Request $request)
    {

        $data = $request->all();
        ProductVariant::create($data);
        return redirect()->back()->with('message', 'Thêm biến thể thành công');
    }

    public function update(Request $request)
    {
        $price = $request->input('price');
        $price_sale = $request->input('price_sale');
        $quantity = $request->input('quantity');
        $product_color_id = $request->input('product_color_id');
        $product_size_id = $request->input('product_size_id');
        $idVariant = $request->input('id');
        foreach ($idVariant as $key => $variantId) {
            $variant = ProductVariant::find($variantId);
            $variant->update([
                'price' => $price[$key],
                'price_sale' => $price_sale[$key],
                'quantity' => $quantity[$key],
                'product_color_id' => $product_color_id[$key],
                'product_size_id' => $product_size_id[$key],
            ]);
        }
        return redirect()->back()->with('success', 'Cập nhật biến thể thành công');
    }

    public function delete($id)
    {
        $variant = ProductVariant::find($id);
        $variant->delete();
        return redirect()->back()->with('message', 'Xóa biến thể thành công');
    }
}
