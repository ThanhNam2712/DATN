<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $role = DB::table('roles')->where('name', 'User')->first();
        $user = DB::table('users')->insertGetId([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => $password,
            'sdt' => '',
            'role_id' => $role->id,
            'status' => 'active',  
        ]);
        if ($user) {
            Auth::loginUsingId($user);
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('error', "Có lỗi xảy ra");
    }
}
