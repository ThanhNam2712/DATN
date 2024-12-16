<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::all();
        return view('admin.tag.index', compact('tag'));
    }

    public function create(Request $request){
        $data = $request->all();
        if (Tag::where('name', $data['name'])->exists()){
            return redirect()->back()->with([
                'message' => 'Tag Exists In Table'
            ]);
        }
        Tag::create($data);

        return redirect()->back()->with([
            'success' => 'Thêm thành công'
        ]);
    }

    public function update(Request $request){
        $tagId = $request->input('id');
        $tagName = $request->input('name');

        foreach($tagId as $key => $id){
            $tag = Tag::find($id);
            $tag->update([
                'name' => $tagName[$key]
            ]);
        }

        return redirect()->back()->with([
            'success' => 'Cập nhật thành công'
        ]);
    }

    public function destroy($id){
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->back()->with([
            'success' => 'Xóa thành công'
        ]);
    }
}
