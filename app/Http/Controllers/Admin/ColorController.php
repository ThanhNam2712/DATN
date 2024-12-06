<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $color = ProductColor::all();
        return view('admin.color.index', compact('color'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product_colors,name'
        ]);

        $data = $request->all();
        ProductColor::create($data);
        return redirect()->back()->with([
            'success' => 'Thêm thành công'
        ]);
    }

    public function update(Request $request)
    {
        $color = $request->input('name');
        $idColor = $request->input('id');

        foreach ($idColor as $key => $id){
            $colors = ProductColor::find($id);
            $colors->update([
                'name' => $color[$key]
            ]);
        }

        return redirect()->back()->with([
            'success' => 'Cập nhật thành công'
        ]);
    }

    public function destroy($id)
    {
        $color = ProductColor::find($id);
        $color->delete();
        return redirect()->back()->with([
            'success' => 'Xóa thành công'
        ]);
    }
}
