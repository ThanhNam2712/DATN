<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Role;
use App\Models\User;
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

    $data = $request->validate([
        'name' => 'required|min:6|max:100',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:4|max:100',
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

}
