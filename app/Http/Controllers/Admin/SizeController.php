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
        $data = $request->all();
        if (ProductSize::where('name', $data['name'])->exists()){
            return redirect()->back()->with([
                'message' => 'Size Exists In Table'
            ]);
        }
        ProductSize::create($data);
        return redirect()->back()->with([
            'message' => 'Size Color Success'
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
            'message' => 'Update Size Success'
        ]);
    }

    public function destroy($id)
    {
        $size = ProductSize::find($id);
        $size->delete();
        return redirect()->back()->with([
            'message' => 'Delete Size Success'
        ]);
    }
}
