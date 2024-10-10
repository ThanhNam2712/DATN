<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Lấy tất cả danh mục
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
}
