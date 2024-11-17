<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
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
        return view('client.home.index', compact('product', 'brandLimit', 'comment'));
    }

    public function detail($id)
    {
        $colorClasses = [
            'Xanh Dương' => 'border-sky-500',
            'Đỏ' => 'bg-red-500',
            'Cam' => 'bg-orange-500',
            'Nâu' => 'bg-green-500',
            'Xanh Nước Biển' => 'bg-purple-500',
            'Vàng' => 'bg-yellow-500',
            'Xám' => 'border-slate-500',
            'Đen' => 'bg-slate-900',
            'Trắng' => 'bg-slate-200',
            'Hồng' => 'bg-pink-500',
        ];
        $product = Product::find($id);
        return view('client.home.detail', compact('product', 'colorClasses'));
    }

    public function postReview(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();

        Review::create($data);

        return redirect()->back()->with([
            'message' => 'Create Review Products Success'
        ]);
    }
}
