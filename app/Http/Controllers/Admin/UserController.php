<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\ChangeEmail;
use App\Models\Role;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //
    function index()
    {
        $users =  User::where('status', '!=', 'block')->get();
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
        'sdt' => 'nullable|regex:/^0\d{9,10}$/',
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

        return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được thêm thành công và trạng thái là active.');
    }
    public function block(Request $request, $id)
{
    $user = User::find($id);
    if (auth()->id() === $user->id) {
        return redirect()->route('admin.users.index')->with('error', 'Bạn không thể khóa chính mình.');
    }

    if ($user->role_id === 2) {
        return redirect()->route('admin.users.index')->with('error', 'Bạn không thể khóa người dùng có quyền admin.');
    }
    $user->status = 'block';
    $user->block_reason = $request->input('block_reason');
    $user->save();
    return redirect()->route('admin.users.index')->with('success', 'User đã bị block thành công!');
}


    public function blockedUsers()
    {
        $users = User::where('status', 'block')->get();
        $roles = Role::all();
        $addresses = Address::all();
        return view('admin.user.block', compact('users', 'roles', 'addresses'));
    }
    public function unblock($id)
{
    $user = User::findOrFail($id);
    $user->status = 'active';  $user->block_reason = null;
    $user->save();
    return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được mở khóa.');
}

    public function changeEmail()
    {
        $change = ChangeEmail::whereIn('status', ['pending', 'check'])->get();
        return view('admin.change.index', compact('change'));
    }

    public function changeView($id)
    {
        $change = ChangeEmail::find($id);
        return view('admin.change.view', compact('change'));
    }

    public function change($id)
    {
        $change = ChangeEmail::find($id);
        $change->update([
            'status' => 'check'
        ]);
        return back()->with([
            'message' => 'Xác Nhận Thành Công'
        ]);
    }

    public function updateEmail($id)
    {
        $change = ChangeEmail::find($id);
        $user = User::where('id', $change->	processed_by)->first();

        $change->update([
            'status' => 'Success',
        ]);

        $user->update([
            'email' => $change->change_email
        ]);

        $this->sendmail($user, $change, $change->change_email);

        return redirect('admin/email/')->with([
            'message' => 'Change Email Success'
        ]);
    }

    private function sendmail($user, $change, $email_to)
    {
        Mail::send('client.mail.email', compact('user', 'change'), function ($message) use ($email_to) {
            $message->from('tuancdph43313@fpt.adu.vn', 'Tuan Clothing');
            $message->to($email_to, $email_to);
            $message->subject("Update Email Client");
        });
    }

    public function success()
    {
        $change = ChangeEmail::where('status', 'success')->get();
        return view('admin.change.index', compact('change'));
    }
}
