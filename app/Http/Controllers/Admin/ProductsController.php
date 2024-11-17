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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function gioiThieu()
    {
        $product = Product::with('tags')->latest('id')->get();

        return view('client.gioithieu', compact('product'));
    }public function lienHe()
    {
        $product = Product::with('tags')->latest('id')->get();

        return view('client.lienhe', compact('product'));
    }
    public function home()
    {
        $products = Product::with(['tags', 'variant'])->orderBy('id')->limit(12)->get();
        $trends = Product::with(['tags', 'variant'])
            ->where('is_trending', 1) // Lọc những sản phẩm đang trending
            ->orderBy('id', 'desc') // Sắp xếp theo ID (hoặc theo cột khác nếu cần)
            ->limit(4) // Giới hạn chỉ lấy 4 sản phẩm
            ->get();
        // dd($trends);
        return view('client.home', compact('products', 'trends'));
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $product = Product::with('category')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->select('products.*', 'categories.name as cate_name')
                            ->where('products.id', 'like', '%'. $search . '%')
                            ->orWhere('products.name', 'like', '%' . $search . '%')
                            ->orWhere('categories.name', 'like', '%' . $search . '%')
                            ->orderBy('products.id', 'asc')
                            ->get();

        return view('admin.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        $color = ProductColor::all();
        $size = ProductSize::all();
        return view('admin.products.create', compact('category', 'brand', 'color', 'size'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image' => 'required|image',
            'description' => 'required|max:255',
            'content' => 'required|max:255',
        ]);
        $data = $request->all();
        $data['is_trending'] = $request->has('is_trending') ? 1 : 0;
        $data['is_sale'] = $request->has('is_sale') ? 1 : 0;
        $data['is_new'] = $request->has('is_new') ? 1 : 0;
        $data['is_show_home'] = $request->has('is_show_home') ? 1 : 0;
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $data['image'] = Common::uploadFile($request->file('image'), 'admin/img/products');
        }

        $product = Product::create($data);

        $id_product = $product->id;

        foreach ($request->variants as $variant) {
            ProductVariant::create([
                'product_id' => $id_product,
                'product_color_id' => $variant['product_color_id'],
                'product_size_id' => $variant['product_size_id'],
                'price_sale' => $variant['price_sale'],
                'price' => $variant['price'],
                'quantity' => $variant['quantity'],
            ]);
        }
        $product->tags()->attach($request->tags);

        return redirect('admin/products/')->with([
            'message' => 'Create Products Success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        $category = Category::query()->pluck('name', 'id')->all();
        $brand = Brand::query()->pluck('name', 'id')->all();
        $color = ProductColor::all();
        $size = ProductSize::all();
        return view('admin.products.show', compact('product', 'category', 'brand', 'color', 'size'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $category = Category::query()->pluck('name', 'id')->all();
        $brand = Brand::query()->pluck('name', 'id')->all();
        $productTags = $product->tags->pluck('id')->all();
        $tag = Tag::query()->pluck('name', 'id')->all();
        $color = ProductColor::all();
        $size = ProductSize::all();
        return view(
            'admin.products.edit',
            compact('product', 'category', 'brand', 'tag', 'color', 'size', 'productTags')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            DB::transaction(function () use ($request, $id) {

                // dd( $request->validate());
                // Update product details
                $product = Product::find($id);
                $request->validate([
                    'name' => 'required|max:255',
                    'category_id' => 'required',
                    'brand_id' => 'required',
                    // 'image' => 'required|image',
                    'description' => 'required|max:255',
                    'content' => 'required|max:255',
                    // 'product_color_id' => 'required',
                    // 'product_size_id' => 'required',
                    // 'price_sale' => 'required|integer',
                    // 'price' => 'required|integer',
                    // 'quantity' => 'required|integer',
                ]);
                $data = $request->all();

                $data['is_trending'] = $request->has('is_trending') ? 1 : 0;
                $data['is_sale'] = $request->has('is_sale') ? 1 : 0;
                $data['is_new'] = $request->has('is_new') ? 1 : 0;
                $data['is_show_home'] = $request->has('is_show_home') ? 1 : 0;
                $data['is_active'] = $request->has('is_active') ? 1 : 0;

                if ($request->hasFile('image')) {
                    $data['image'] = Common::uploadFile($request->file('image'), 'admin/img/products');
                }

                $product->update($data);

                $id_product = $product->id;
                // dd($id_product);
                foreach ($request->variants as $variantData) {
                    // dd($request->variants);
                    if (isset($variantData['id'])) {
                        // Nếu có ID, đây là biến thể cũ cần cập nhật
                        $variant = ProductVariant::find($variantData['id']);
                        // Cập nhật thông tin biến thể
                        $variant->update([
                            'price' => $variantData['price'],
                            'price_sale' => $variantData['price_sale'],
                            'quantity' => $variantData['quantity'],
                            'product_color_id' => $variantData['product_color_id'],
                            'product_size_id' => $variantData['product_size_id'],
                        ]);
                    } else {
                        // Nếu không có ID, đây là biến thể mới cần thêm
                        ProductVariant::create([
                            'product_id' => $id_product,
                            'product_color_id' => $variantData['product_color_id'],
                            'product_size_id' => $variantData['product_size_id'],
                            'price_sale' => $variantData['price_sale'],
                            'price' => $variantData['price'],
                            'quantity' => $variantData['quantity'],
                        ]);
                    }
                }
                $product->tags()->sync($request->tags);
            });

            return back()->with('success', 'Product updated successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('error', $th->getMessage());
        }
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

    public function soft()
    {
        $product = Product::onlyTrashed()->get();
        return view('admin.products.delete', compact('product'));
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->find($id);

        $product->restore();

        return redirect()->back()->with([
            'message' => 'Connect Success'
        ]);
    }
}
