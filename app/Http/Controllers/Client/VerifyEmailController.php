<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Mail;
use URL;

class VerifyEmailController extends Controller
{

    public function sendVerificationEmail($user)
    {
        $verificationUrl = URL::temporarySignedRoute(
            'account.verify.email',
            now()->addMinutes(60),  // Link sẽ hết hạn sau 60 phút
            ['user' => $user->id]
        );

        \Mail::to($user->email)->send(new \App\Mail\VerifyEmail($user, $verificationUrl));
    }

    public function verify($userId)
    {
        $user = User::findOrFail($userId);
        $user->status = 'active';
        $user->email_verified_at = now();
        $user->save();

        Auth::login($user);

        return redirect()->route('account.showFormLogin')->with('status', 'Tài khoản của bạn đã được xác minh thành công!');
    }
    public function showResendForm()
    {
        return view('client.resendmail');
    }
    public function resendVerification(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $data['email'])->first();

        if ($user && $user->status == 'inactive') {
            $verificationUrl = URL::temporarySignedRoute(
                'account.verify.email',
                now()->addMinutes(60),
                ['user' => $user->id] // Đảm bảo tham số là `user` với giá trị là ID
            );

            Mail::to($user->email)->send(new VerifyEmail($user, $verificationUrl));

            session()->flash('success', 'Email xác minh đã được gửi lại. Vui lòng kiểm tra hộp thư của bạn.');

            return redirect()->route('account.showFormLogin');
        }

        return back()->with('error', 'Không tìm thấy người dùng hoặc tài khoản đã được xác minh.');
    }



}
