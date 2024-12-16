<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $size = ProductSize::all();
        return view('admin.size.index', compact('size'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product_sizes,name'
        ]);
        $data = $request->all();
        if (ProductSize::where('name', $data['name'])->exists()){
            return redirect()->back()->with([
                'message' => 'Size Exists In Table'
            ]);
        }
        ProductSize::create($data);
        return redirect()->back()->with([
            'success' => 'Thêm thành công'
        ]);
    }

    public function update(Request $request)
    {
        $size = $request->input('name');
        $idSize = $request->input('id');

        foreach ($idSize as $key => $id){
            $sizes = ProductSize::find($id);
            $sizes->update([
                'name' => $size[$key]
            ]);
        }

        return redirect()->back()->with([
            'success' => 'Cập nhật thành công'
        ]);
    }

    public function destroy($id)
    {
        $size = ProductSize::find($id);
        $size->delete();
        return redirect()->back()->with([
            'success' => 'Xóa thành công'
        ]);
    }
}
