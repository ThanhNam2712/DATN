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
        $reviews = Review::paginate(5);
        return view('admin.reviews.index', compact('reviews'));
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
