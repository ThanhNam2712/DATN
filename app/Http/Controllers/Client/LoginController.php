<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{


    public function showFormLogin(){
        return view('client.form_login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:40',
        ]);

        $user = User::where('email', $data['email'])->first();

        if ($user) {
            if ($user->status === 'block') {
                return view('client.404', ['block_reason' => $user->block_reason]);
            }
            if ($user->status === 'inactive') {
                return back()->withErrors([
                    'email' => 'Tài khoản của bạn chưa được xác minh. Vui lòng kiểm tra email để kích hoạt tài khoản.'
                ]);
            }

            if (Hash::check($data['password'], $user->password)) {
                Auth::loginUsingId($user->id);
                $request->session()->flash('success', 'Đăng nhập thành công!');
                return redirect()->intended('client/home');
            }
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return view('client.form_login');
    }

    }


