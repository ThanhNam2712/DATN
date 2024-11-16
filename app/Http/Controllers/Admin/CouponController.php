<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupon = Coupon::all();
        return view('admin.coupon.index', compact('coupon'));
    }

    public function create()
    {
        $user = User::all();
        return view('admin.coupon.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|max:30',
            'discount_type' => 'required',
            'discount_value' => 'required|numeric|max:50',
            'expiration_date' => 'required',
            'start_end' => 'required',
            'minimum_order_amount' => 'required',
            'number' => 'required',
        ]);
        $data = $request->all();

        Coupon::create($data);
        return redirect('admin/coupon/')->with([
            'message' => 'Create Coupon Success'
        ]);
    }

    public function update($id)
    {
        $user = User::all();
        $coupon = Coupon::find($id);
        return view('admin.coupon.update', compact('user', 'coupon'));
    }

    public function edit(Request $request,$id)
    {
        $coupon = Coupon::find($id);
        $data = $request->all();
        $dateStart = $request->input('start_end');
        $dateEnd = $request->input('expiration_date');

        if ($dateStart >= $dateEnd){
            return redirect()->back()->with([
                'message' => 'Ngày Bắt đầu không được lớn hơn ngày kết thúc',
            ]);
        }
        $coupon->update($data);
        return redirect()->back()->with([
            'message' => 'Update Coupon Success',
        ]);
    }

    public function delete($id)
    {
        $coupon = Coupon::find($id);

        $coupon->delete();
        return redirect()->back()->with([
            'message' => 'Update Coupon Success',
        ]);
    }
}
