<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\ChangeEmail;
use App\Models\Coupon;
use App\Models\User;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UserEditController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $address = Address::where('user_id', $id)->get();
        $coupon = Coupon::where('number', '>=', 1)->get();

//        $provinces = collect($this->location(''));
//        $districts = $this->location('d/');
//        $wards = $this->location('w/');
        return view('client.profile.index', compact('address', 'coupon'));
    }

    private function location($endpoint)
    {
        return Http::withHeaders([
            'token' => '33d38975-8f97-11ef-b065-1e41f6c66bec',
        ])->withoutVerifying()->timeout(120)->get('https://provinces.open-api.vn/api/' . $endpoint)->json();
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->validate([
            'name' => 'required|min:6|max:100',
            'sdt' => 'nullable|numeric', // Nếu có số điện thoại
        ]);
        if ($request->hasFile('avatar')) {
            $data['avatar'] = Common::uploadFile($request->file('avatar'), 'client/img/avatar');

            $file_old = $request->input('file_old');
            if ($file_old && Storage::disk('public')->exists($file_old)) {
                Storage::disk('public')->delete($file_old);
            }
        }

        $user->update($data);
        return redirect()->back()->with([
            'message' => 'Update Profile Success'
        ]);
    }

    public function changePass(Request $request)
    {
        if (!Hash::check($request->passOld, Auth::user()->password)) {
            return redirect()->back()->with(['message' => 'The current password is incorrect']);
        } elseif ($request->pass_confirm != $request->passNew) {
            return redirect()->back()->with(['message' => 'The current password is incorrect']);
        }

        Auth::user()->update([
            'password' => Hash::make($request->pass_confirm),
        ]);

        return redirect()->back()->with([
            'message' => 'Update Password Success',
        ]);
    }

    public function changeAddress(Request $request, $id)
    {
        $address = Address::find($id);
        $data = $request->all();

        if ($request->has('is_default') && $request->input('is_default') == 1) {
            Address::where('user_id', Auth::id())
                ->where('id', '!=', $id)
                ->update(['is_default' => 0]);
        }
        $address->update($data);
        return redirect()->back()->with([
            'message' => 'Update Address Success',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['is_default'] = $request->has('is_default') ? 1 : 0;

        $address = Address::create($data);

        if ($data['is_default'] == 1) {
            Address::where('user_id', Auth::id())
                ->where('id', '!=', $address->id)
                ->update(['is_default' => 0]);
        }
        return redirect()->back()->with([
            'message' => 'Create Address Success',
        ]);
    }

    public function delete($id)
    {
        $address = Address::find($id);
        $address->delete();
        return redirect()->back()->with([
            'message' => 'Delete Address Success'
        ]);
    }

    public function changeEmail()
    {
        return view('client.change.email');
    }

    public function postEmail(Request $request)
    {

        $request->validate([
            'change_email' => 'required|email|unique:users,email',
        ]);
        $userId = Auth::id();
        $data = $request->all();
        $data['processed_by'] = $userId;
        ChangeEmail::create($data);

        return back()->with([
            'message' => 'Yêu Cầu Thay Đổi Email Thành Công, Vui Lòng Đợi Email Từ Admin'
        ]);
    }
}
