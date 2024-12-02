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

        // if (Auth::check() && Auth::user()->status == "block") {
        //     Auth::logout();
        //     return redirect()->route('account.showForm')->with('error', 'Tài khoản bạn đã bị khóa');
        // }
        //  if (Auth::check() && Auth::user()->status == "inactive") {
        //     return redirect()->route('account.showFormLogin')->with('error', 'Tài khoản bạn chưa xác minh');
        // }

        if (Auth::check()) {
            $user = Auth::user();
            if ($user && $user->status === 'block') {
                return redirect()->route('client.404', ['block_reason' => $user->block_reason]);
            }
            if ($user->status === 'inactive') {
                return back()->withErrors([
                    'email' => 'Tài khoản của bạn chưa được xác minh. Vui lòng kiểm tra email để kích hoạt tài khoản.'
                ]);
            }
        }
        return $next($request);
    }
}
