<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use App\Utilities\Common;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        $tag = Tag::all();
        $color = ProductColor::all();
        $size = ProductSize::all();
        return view('admin.products.create', compact('category', 'brand', 'tag', 'color', 'size'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['is_trending'] = $request->has('is_trending') ? 1 : 0;
        $data['is_sale'] = $request->has('is_sale') ? 1 : 0;
        $data['is_new'] = $request->has('is_new') ? 1 : 0;
        $data['is_show_home'] = $request->has('is_show_home') ? 1 : 0;
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')){
            $data['image'] = Common::uploadFile($request->file('image'), 'admin/img/products');
        }

        $product = Product::create($data);

        $id_product = $product->id;

        foreach($request->variants as $variant){
        ProductVariant::create([
            'product_id' => $id_product,
            'product_color_id' => $variant['product_color_id'],
            'product_size_id' => $variant['product_size_id'],
            'price_sale' => $variant['price_sale'],
            'price' => $variant['price'],
            'quantity' => $variant['quantity'],
        ]);
        }
        return redirect('admin/products/')->with([
            'message' => 'Create Products Success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with([
            'message' => 'Destroy Products Success'
        ]);
    }
}
