<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderByDesc('id')->paginate(5);
        return view('admin.brands.index', compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.brands.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $dataBrand = [
            'name' => $request->name,

        ];
        if ($request->hasFile('image')) {
            $dataBrand['image'] = Common::uploadFile($request->file('image'), 'admin/img/brands');
        }
        Brand::query()->create($dataBrand);
        return redirect()->route('brands.index')
            ->with('success', 'Thêm mới Thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $data = Brand::findOrFail($id);
            return response()->json($data);

        } catch (\Throwable $th) {
            return response()->json(
                [
                    'error' => $th->getMessage()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $brand = Brand::findOrFail($id);
        if ($request->hasFile('image')) {
            $data['image'] = Common::uploadFile($request->file('image'), 'admin/img/brands');

            $file_old = $brand->image;
            if ($file_old && Storage::disk('public')->exists($file_old)) {
                Storage::disk('public')->delete($file_old);
            }

        } else {
            $data['image'] = $brand->image;
        }
        $brand->update($data);
        return redirect()->route('brands.index')
            ->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $brand = Brand::findOrFail($id);
        $brand->delete();
        if ($brand->image && $brand->image && file_exists(public_path($brand->image))) {
            unlink(public_path($brand->image));
        }
        return redirect()->route('brands.index');
    }
}
