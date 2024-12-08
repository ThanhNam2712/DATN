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
<<<<<<< HEAD
        
=======
>>>>>>> 83969eb20678122d948ebcc42d9e6ec02f52cd71
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
