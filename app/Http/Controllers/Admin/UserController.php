<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Role;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function index()
    {
        $users = User::all();
        $roles = Role::all();
        $addresses = Address::all();
        return view('admin.user.index', compact('users', 'roles','addresses'));
    }
    public function edit($id)
{
    $user = User::findOrFail($id);
    $roles = Role::all();
    $address = Address::where('user_id', $id)->first(); // Lấy một bản ghi địa chỉ

    return view('admin.user.edit', compact('user', 'roles', 'address'));
}
public function update(Request $request, $id)
{
    $user = User::find($id);
    if (!$user) {
        return redirect()->route('admin.users.index')->with('error', 'Người dùng không tồn tại.');
    }
    if ($user->role_id == 2 && Auth::user()->role_id == 2 && Auth::id() != $user->id) {
        return redirect()->route('admin.users.index')->with('error', 'Bạn không được phép cập nhật tài khoản Admin khác.');
    }

    $data = $request->validate([
        'name' => 'required|min:6|max:100',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:4|max:100',
        'sdt' => 'nullable|min:10|max:11',
        'role_id' => 'required|exists:roles,id',
    ]);

    if ($request->filled('password')) {
        $data['password'] = Hash::make($data['password']);
    } else {
        unset($data['password']);
    }

    $user->update($data);

    return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được cập nhật thành công.');
}



    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'Người dùng không tồn tại.');
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được xóa thành công.');
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'sdt' => 'nullable|numeric',
            'role_id' => 'required|exists:roles,id',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sdt = $request->sdt;
        $user->role_id = $request->role_id;
        $user->password = bcrypt($request->password);
        $user->status = 'active';

        $user->save();

        // Quay lại danh sách người dùng với thông báo thành công
        return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được thêm thành công và trạng thái là active.');
    }



}
