<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $product = Product::find($id);

        return view('admin.reviews.index', compact('product'));
=======
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews'));
>>>>>>> 32488c3c0171f99681826f3ff09d74f46448a395
    }

    public function delete($id)
    {
        $review = Review::find($id);
        $review->delete();
        return redirect()->back()->with([
            'message' => 'Delete Success'
        ]);
    }
}
