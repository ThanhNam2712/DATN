<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()){
            if (Auth::user()->role_id === 2 || Auth::user()->role_id === 4){
                return $next($request);
            }else{
                return redirect()->back()->with([
                    'message' => 'You Are Not A Super Admin'
                ]);
            }
        }
        return redirect()->route('login.login')->with([
            'message' => 'Vui Lòng Đăng NHập Trước',
        ]);
    }
}
