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
        $data = $request->all();
        if (ProductColor::where('name', $data['name'])->exists()){
            return redirect()->back()->with([
                'message' => 'Color Exists In Table'
            ]);
        }
        ProductColor::create($data);
        return redirect()->back()->with([
            'message' => 'Create Color Success'
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
            'message' => 'Update Color Success'
        ]);
    }

    public function destroy($id)
    {
        $color = ProductColor::find($id);
        $color->delete();
        return redirect()->back()->with([
            'message' => 'Delete Color Success'
        ]);
    }
}
