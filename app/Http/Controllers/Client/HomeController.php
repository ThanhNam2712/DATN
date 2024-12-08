<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
<<<<<<< HEAD
use App\Models\Gallery;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
=======
use App\Models\Product;
>>>>>>> 83969eb20678122d948ebcc42d9e6ec02f52cd71
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(5);
        $brandLimit = Brand::orderBy('id', 'asc')->limit(1)->get();
        $comment = Review::limit(5)->get();
<<<<<<< HEAD

        foreach ($product as $list){
            $list->firstVariant = $list->variant->first()->id;
        }
        return view('client.home.index', compact('product', 'brandLimit', 'comment'));
    }

    public function detail(Request $request ,$id)
    {
        $variant = $request->segment(6);

        $colorClasses = [
            'Xanh Dương' => 'bg-sky-500',
=======
        return view('client.home.index', compact('product', 'brandLimit', 'comment'));
    }

    public function detail($id)
    {
        $colorClasses = [
            'Xanh Dương' => 'border-sky-500',
>>>>>>> 83969eb20678122d948ebcc42d9e6ec02f52cd71
            'Đỏ' => 'bg-red-500',
            'Cam' => 'bg-orange-500',
            'Nâu' => 'bg-green-500',
            'Xanh Nước Biển' => 'bg-purple-500',
            'Vàng' => 'bg-yellow-500',
<<<<<<< HEAD
            'Xám' => 'bg-slate-500',
            'Đen' => 'bg-slate-900',
            'Trắng' => 'bg-slate-200',
            'Hồng' => 'bg-pink-500',
            'Hồng Tím' => 'bg-sky-500',
        ];

        $product = Product::find($id);
        $image = Gallery::where('variant_id', $variant)->get();
        $priceVariant = ProductVariant::find($variant);
        return view('client.home.detail', compact('product', 'image' ,'colorClasses', 'variant', 'priceVariant'));
=======
            'Xám' => 'border-slate-500',
            'Đen' => 'bg-slate-900',
            'Trắng' => 'bg-slate-200',
            'Hồng' => 'bg-pink-500',
        ];
        $product = Product::find($id);
        return view('client.home.detail', compact('product', 'colorClasses'));
>>>>>>> 83969eb20678122d948ebcc42d9e6ec02f52cd71
    }

    public function postReview(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();

<<<<<<< HEAD
        $hasPurchased = OrderItem::join('orders', 'order_items.order_id', '=', 'orders.id')
        ->where('orders.user_id', Auth::id())
        ->where('order_items.product_id', $request->product_id)
        ->exists();

        if (!$hasPurchased) {
            return redirect()->back()->with([
                'error' => 'Bạn phải mua sản phẩm này trước khi đánh giá.',
            ]);
        }

        $review = Review::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->exists();

        if ($review) {
            return redirect()->back()->with([
                'error' => 'Bạn chỉ có thể đánh giá sản phẩm này một lần.',
            ]);
        }

=======
>>>>>>> 83969eb20678122d948ebcc42d9e6ec02f52cd71
        Review::create($data);

        return redirect()->back()->with([
            'message' => 'Create Review Products Success'
        ]);
    }
}
