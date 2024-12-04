<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Gallery;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(4);
        $brandLimit = Brand::orderBy('id', 'asc')->limit(1)->get();
        $comment = Review::limit(5)->get();
        $viewProduct = Product::orderBy('view', 'desc')->limit(3)->get();
        return view('client.home.index', compact('product', 'brandLimit', 'comment', 'viewProduct'));
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
        return view('client.home.detail', compact('product', 'image' ,'colorClasses', 'variant', 'priceVariant', 'productRelated', 'imageFirst'));
    }

    public function postReview(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();

        // Lấy đơn hàng liên quan đến sản phẩm
        $order = OrderItem::join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.user_id', Auth::id())
            ->where('order_items.product_id', $request->product_id)
            ->whereIn('orders.status', ['completed', 'Giao Thành công'])
            ->select('orders.id', 'order_items.order_id')
            ->first();

        if (!$order) {
            return redirect()->back()->with([
                'error' => 'Bạn phải mua sản phẩm này trước khi đánh giá.',
            ]);
        }

//        $existingReview = Review::where('user_id', Auth::id())
//            ->where('product_id', $request->product_id)
//            ->where('order_id', $order->id) // Kiểm tra dựa trên đơn hàng
//            ->first();
//
//        if ($existingReview) {
//            return redirect()->back()->with([
//                'error' => 'Bạn đã đánh giá sản phẩm này cho đơn hàng này. Vui lòng mua thêm sản phẩm để đánh giá lại.',
//            ]);
//        }
//
//        $data['order_id'] = $order->id;

        Review::create($data);

        return redirect()->back()->with([
            'message' => 'Đánh giá sản phẩm thành công!',
        ]);
    }

}
