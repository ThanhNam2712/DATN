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
            'password' => 'required|min:4|max:100',
        ]);
        $user = User::where('email', $data['email'])->first();

        // Kiểm tra xem người dùng có tồn tại không và mật khẩu có đúng không
        if ($user && Hash::check($data['password'], $user->password)) {
            Auth::loginUsingId($user->id);
            $request->session()->regenerate();
            return redirect()->intended('client/home');
        }
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        return view('client.form_login');
    }

    }


