<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Review;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('id', 'desc')->paginate(4);
        $cateLimit = Category::orderBy('id', 'asc')->limit(3)->get();
        $comment = Review::limit(5)->get();
        $viewProduct = Product::orderBy('view', 'desc')->limit(3)->get();
        $slides = Slide::limit(3)->get();
        return view('client.home.index', compact('product', 'cateLimit', 'comment', 'viewProduct', 'slides'));
    }

    public function detail(Request $request ,$id)
    {
        $variant = $request->segment(6);

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

        $product = Product::find($id);
        if (!$product){
            return view('client/notFound');
        }
        if ($product){
            $product->view = $product->view + 1;
            $product->save();
        }
        $image = Gallery::where('variant_id', $variant)
                        ->limit(5)
                        ->get();
        $imageFirst = Gallery::where('variant_id', $variant)->first();

        $priceVariant = ProductVariant::find($variant);
        $productRelated = Product::orderBy('id', 'desc')
                        ->where('category_id', $product->category_id)
                        ->where('id', '!=', $product->id)
                        ->limit(4)
                        ->get();
        $averageRating = round($product->averageRating(), 1);
        $avgRating = $this->countAvgRating($product);
        $ratingDistribution = $avgRating['ratingDistribution'];
        return view('client.home.detail', compact('product', 'image', 'averageRating' ,
            'colorClasses', 'variant', 'priceVariant', 'productRelated', 'imageFirst', 'ratingDistribution'));
    }



    private function countAvgRating($product)
    {
        $totalRatings = $product->review->count();
        $ratings = $product->review()
            ->selectRaw('rating, COUNT(*) as count')
            ->groupBy('rating')
            ->pluck('count', 'rating');

        // Tính phần trăm từng mức sao (từ 1 đến 5)
        $ratingDistribution = [];
        for ($i = 5; $i >= 1; $i--) {
            $ratingDistribution[$i] = [
                'count' => $ratings->get($i, 0), // Số đánh giá cho mức sao
                'percent' => $totalRatings > 0 ? ($ratings->get($i, 0) / $totalRatings) * 100 : 0, // Tỷ lệ phần trăm
            ];
        }

        // Tính điểm trung bình
        $averageRating = $product->review->avg('rating');

        // Trả về cả điểm trung bình và phân bố đánh giá
        return [
            'averageRating' => $averageRating,
            'ratingDistribution' => $ratingDistribution,
            'totalRatings' => $totalRatings,
        ];
    }

}
