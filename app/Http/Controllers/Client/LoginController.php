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
        // Xác thực đầu vào
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:20',
        ]);

        $user = User::where('email', $data['email'])->first();

        if ($user) {
            if ($user->status === 'block') {
                return back()->withErrors([
                    'email' => 'Tài khoản của bạn hiện đang bị vô hiệu hóa, vui lòng liên hệ QTV.',
                ]);
            }
            if (Hash::check($data['password'], $user->password)) {
                Auth::loginUsingId($user->id);
                $request->session()->regenerate();
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


