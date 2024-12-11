<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slide.index', compact('slides'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = Common::uploadFile($request->file('image'), 'admin/img/slides');
        }

        Slide::create($data);
        return back()->with([
            'message' => 'Thêm ảnh slide thành công'
        ]);
    }

    public function update(Request $request,$id)
    {
        $slides = Slide::find($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = Common::uploadFile($request->file('image'), 'admin/img/slides');

            $file_old = $slides->image;
            if ($file_old && Storage::disk('public')->exists($file_old)){
                Storage::disk('public')->delete($file_old);
            }
        }else{
            $data['image'] = $slides->image;
        }

        $slides->update($data);
        return back()->with([
            'message' => 'Sửa ảnh slide thành công'
        ]);
    }

    public function delete($id)
    {
        $slide = Slide::find($id);

        if ($slide && $slide->image != ''){
            Storage::disk('public')->delete($slide->image);
        }
        $slide->delete();

        return back()->with([
            'message' => 'Xóa ảnh slide thành công'
        ]);
    }
}
