<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'expiration_date' => 'required',
            'start_end' => 'required',
            'minimum_order_amount' => 'required',
            'number' => 'required|numeric|min:1',
        ]);
        $data = $request->all();
        $coupon = Coupon::create($data);

        if ($request->user_id){
            $user = User::find($request->user_id);
            if ($user){
                $this->sendmail($user, $coupon, $user->email);
            }
        }

        return redirect('admin/coupon/')->with([
            'message' => 'Create Coupon Success'
        ]);
    }

    private function sendmail($user, $coupon, $email_to)
    {
        Mail::send('client.mail.coupon', compact('user', 'coupon'), function ($message) use ($email_to) {
            $message->from('tuancdph43313@fpt.adu.vn', 'Tuan Clothing');
            $message->to($email_to, $email_to);
            $message->subject("New Coupon Available!");
        });
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
