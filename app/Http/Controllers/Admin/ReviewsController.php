<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function index($id)
    {
        $product = Product::find($id);
        return view('admin.reviews.index', compact('product'));
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
