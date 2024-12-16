<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_tag;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $tag = Tag::all();
        $product_tag = Product_tag::all();
        return view('admin.product_tag.index', compact( 'product', 'tag','product_tag'));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        Product_tag::create($data);

        return redirect()->back()->with([
            'success' => 'Thêm thành công'
        ]);
    }

    public function update(Request $request, $id)
    {
        $product_tag = Product_tag::find($id);
        $data = $request->all();
        $product_tag->update($data);
        return redirect()->back()->with([
            'success' => 'Cập nhật thành công'
        ]);
    }

    public function destroy($id)
    {
        $product_tag = Product_tag::find($id);
        $product_tag->delete();
        return redirect()->back()->with([
            'success' => 'Xóa thành công'
        ]);
    }
}
