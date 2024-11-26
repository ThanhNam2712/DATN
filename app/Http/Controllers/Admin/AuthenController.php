<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenController extends Controller
{
    public function login()
    {
        return view('admin.login.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login/login')->with([
            'message' => 'Logout Success'
        ]);
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            if (Auth::user()->role_id == 2){
                return redirect()->route('admin.statistic.index')->with([
                    'message' => 'Login Success'
                ]);
            }else{
                return redirect()->route('admin.shipment.index')->with([
                    'message' => 'Login Success'
                ]);
            }

        }
        else{
            return redirect()->back()->with([
                'message' => 'Login Fail'
            ]);
        }
    }
    public function resister()
    {
        return view('admin.login.resister');
    }

    public function postResister(Request $request)
    {
        $roles = Roles::where('name', 'Admin')->first();
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['role_id'] = 2;
        $data['sdt'] = " ";
        $data['status'] = " ";

        User::create($data);

        return redirect('login/login')->with('message', "Thành Công Rồi Hahahha");
    }
}
