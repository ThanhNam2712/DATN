<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $colorClasses = [
            'Xanh Dương' => 'bg-sky-500',
            'Đỏ' => 'bg-red-500',
            'Cam' => 'bg-orange-500',
            'Nâu' => 'bg-green-500',
            'Xanh Nước Biển' => 'bg-purple-500',
            'Vàng' => 'bg-yellow-500',
            'Xám' => 'bg-slate-500',
            'Đen' => 'bg-slate-900',
            'Trắng' => 'bg-slate-200',
            'Hồng' => 'bg-pink-500',
            'Hồng Tím' => 'bg-sky-500',
        ];
        $products = $this->getProductShop($request);
        $category = Category::all();
        $brand = Brand::all();
        $colors = ProductColor::all();
        $sizes = ProductSize::all();
        return view('client.shop.index', compact('category', 'brand', 'products', 'colors', 'sizes' ,'colorClasses'));
    }


    public function category(Request $request, $name)
    {
        $colorClasses = [
            'Xanh Dương' => 'bg-sky-500',
            'Đỏ' => 'bg-red-500',
            'Cam' => 'bg-orange-500',
            'Nâu' => 'bg-green-500',
            'Xanh Nước Biển' => 'bg-purple-500',
            'Vàng' => 'bg-yellow-500',
            'Xám' => 'bg-slate-500',
            'Đen' => 'bg-slate-900',
            'Trắng' => 'bg-slate-200',
            'Hồng' => 'bg-pink-500',
            'Hồng Tím' => 'bg-sky-500',
        ];
        $products = Category::where('name', $name)->first()->products;
        $category = Category::all();
        $brand = Brand::all();
        $colors = ProductColor::all();
        $sizes = ProductSize::all();
        return view('client.shop.index', compact('category', 'brand', 'products', 'colors', 'sizes' ,'colorClasses'));
    }

    public function getProductShop($request)
    {

        $search = $request->search ?? '';
        $products = Product::where('name', 'like' , '%' . $search . '%');
        $products = $this->filter($products, $request);
        $products = $this->sortAndPagination($products, $request);

        return $products;
    }

    private function sortAndPagination($products, Request $request)
    {
        $perPage = $request->show ?? 3;
        $sortBy = $request->sort_by ?? 'latest';

        switch ($sortBy)
        {
            case 'latest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderByDesc('id');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('name');
                break;
            case 'discount-ascending':
                $products = $products->orderBy('discount');
                break;
            case 'discount-descending':
                $products = $products->orderByDesc('discount');
                break;
            default:
                $products = $products->orderBy('id');
        }

        $products = $products->paginate($perPage);

        $products->appends([
            'sort_by' => $sortBy,
            'show' => $perPage
        ]);

        return $products;
    }

    private function filter($products, Request $request)
    {
        // product price
        $priceMin = $request->filterMin;
        $priceMax = $request->filterMax;

        $priceMin = str_replace('$', '', $priceMin);
        $priceMax = str_replace('$', '', $priceMax);

        $products = $priceMin != null && $priceMax != null ? $products->whereHas('variant', function ($response) use ($priceMin, $priceMax){
            return $response->where('price_sale', [$priceMax, $priceMin])
                ->where('price_sale', [$priceMax, $priceMin]);
        }) : $products;

        // brands
        $brand = $request->brand ?? [];
        $brand_ids = array_keys($brand);
        $products = $brand_ids != null ? $products->whereIn('brand_id', $brand_ids) : $products;

        $rating = $request->rating ?? [];
        $products = $rating != null ? $products->whereHas('review', function ($response) use ($rating){
            return $response->where('rating', $rating)
                ->where('rating', $rating);
        }) : $products;

        // Color
        $color = $request->name_color;
        $products = $color != null ? $products->whereHas('variant', function ($response) use ($color){
            return $response->where('product_color_id', $color)
                ->where('product_color_id', $color);
        }) : $products;


        // Size Products
        $size = $request->name_size;

        $products = $size != null ? $products->whereHas('variant', function ($response) use ($size){
            return $response->where('product_size_id', $size)
                ->where('product_size_id', $size);
        }): $products;

        return $products;
    }

    public function introduce()
    {
        return view('client.profileShop.index');
    }
}
