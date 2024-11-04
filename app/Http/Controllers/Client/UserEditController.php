<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserEditController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $address = $user->addresses;

        return view('client.account.index', compact('user', 'address'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('client.account.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Xác thực dữ liệu đầu vào
        $data = $request->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'sdt' => 'nullable|numeric', // Nếu có số điện thoại
            'password' => 'nullable|min:4|max:100',
        ]);

        // Băm mật khẩu nếu có thay đổi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
        return redirect()->route('auth.user.account')->with('success', 'Thông tin người dùng đã được cập nhật.');
    }
    public function addAddresses()
    {
        return view('client.account.add_address');
    }

    public function storeAddAddress(Request $request)
    {
        $data = $request->validate([
            'Province' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'Neighborhood' => 'nullable|string|max:100',
            'Apartment' => 'nullable|string|max:100',
        ]);
        $data['status'] = $data['status'] ?? 0;


        auth()->user()->addresses()->create($data);

        return redirect()->route('auth.user.account')->with('success', 'Địa chỉ đã được thêm thành công.');
    }

    public function editAddress($id)
    {
        $address = auth()->user()->addresses()->findOrFail($id);
        return view('client.account.edit_address', compact('address'));
    }

    public function updateAddress(Request $request, $id)
    {
        $address = auth()->user()->addresses()->findOrFail($id);
        $data = $request->validate([
            'Province' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'Neighborhood' => 'nullable|string|max:100',
            'Apartment' => 'nullable|string|max:100',
        ]);

        $address->update($data);

        return redirect()->route('auth.user.account')->with('success', 'Địa chỉ đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $address = auth()->user()->addresses()->findOrFail($id);

        $address->delete();

        return redirect()->route('auth.user.account')->with('success', 'Địa chỉ đã được xóa thành công.');
    }
}
