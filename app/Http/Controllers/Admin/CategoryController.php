<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Utilities\Common;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.category.index', compact('categories'));
    }
    public function getCategories()//call api cho front
    {
        $categories = Category::all();
        return response()->json($categories);
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255|unique:categories,name',
        //     'image' => 'nullable',
        // ]);
        $data = $request->all();


        if ($request->hasFile('image')) {
            $data['image']  = Common::uploadFile($request->file('image'), 'admin/img/brands');
        }
            Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được thêm thành công!');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/categories', 'public');
            $category->image = $path;
        }
        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được cập nhật thành công!');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Danh mục đã được xóa mềm thành công!');
    }

    public function soft()
    {
        $categories = Category::onlyTrashed()->paginate(5);
        return view('admin.Category.soft', compact('categories'));
    }

    public function restore($id)
    {
        $categories = Category::onlyTrashed()->find($id);
        $categories->restore();
        return back()->with([
            'message' => 'Khôi phục Thành Công'
        ]);
    }
}
