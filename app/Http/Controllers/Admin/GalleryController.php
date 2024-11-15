<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index($id)
    {
         $product = Product::find($id);
//         $variant = ProductVariant::find($product->id);

         return view('admin.imageVariant.index', compact('product'));
    }

    public function create($id, $id_variant)
    {
        $product = Product::find($id);
        $variant = ProductVariant::find($id_variant);
        return view('admin.imageVariant.create', compact('product', 'variant'));
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();

        if ($request->hasFile('file_path')){
            foreach ($request->file('file_path') as $imageColor){
                $upload = $imageColor;
                if ($upload->isValid()){
                    $data['file_path'] = Common::uploadFile($upload, 'admin/assets/img/image');
                    Gallery::create($data);
                }else {
                    alert('Fail');
                }
            }
        }

        return redirect('admin/gallery/product/'. $id )->with([
            'message' => 'Create Image Success'
        ]);
    }

    public function update(Request $request, $id)
    {
        $image = Gallery::find($id);
        $data = $request->all();

        if ($request->hasFile('file_path')){
            $data['file_path'] = Common::uploadFile($request->file('file_path'), 'admin/assets/img/image');
            $old_image = $request->input('old_image');
            if ($old_image && Storage::disk('public')->exists($old_image)){
                Storage::disk('public')->delete($old_image);
            }
        } else {
            $data['file_path'] = $image->file_path;
        }

        $image->update($data);
        return redirect()->back()->with([
            'message' => 'Update Image Success'
        ]);
    }

}
