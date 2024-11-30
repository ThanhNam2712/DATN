<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use URL;

class RegisterController extends Controller
{

    public function showForm(){
        return view('client.form_register');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|min:6|max:100',
            'password' => 'required|min:4|max:100',
        ]);
        $password = Hash::make($data['password']);
        $role = DB::table('roles')->where('name', 'Client')->first();
        $userId = DB::table('users')->insertGetId([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => $password,
            'sdt' => '',
            'role_id' => $role->id,
            'status' => 'inactive',
        ]);
        if ($userId) {
            $user = DB::table('users')->find($userId);

            $verificationUrl = URL::temporarySignedRoute(
                'account.verify.email',
                now()->addMinutes(60),  // Link hết hạn sau 60 phút
                ['user' => $user->id ]
            );

            // Gửi email xác minh
            \Mail::to($user->email)->send(new \App\Mail\VerifyEmail($user, $verificationUrl));
            session()->flash('status', 'Vui lòng kiểm tra email của bạn và nhấn vào liên kết để xác minh tài khoản.');

            return redirect()->route('account.showFormLogin')->with('status', 'Chúng tôi đã gửi email xác minh cho bạn. Vui lòng kiểm tra hộp thư của bạn!');
        }
        return back()->with('error', "Có lỗi xảy ra");
    }
}
