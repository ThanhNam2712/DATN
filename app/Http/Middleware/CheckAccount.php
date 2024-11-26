<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        if (Auth::check()) {
//            if (Auth::user()->status === 'success'){
//                return $next($request);
//            }else{
//                return redirect()->back()->with('message', 'Tài khoản bạn đã bị khóa');
//            }
//        }
//        return redirect()->route('account.showForm')->with([
//            'messageLog' => 'Bạn không đủ quyền để truy cập',
//        ]);
        return $next($request);
    }
}
