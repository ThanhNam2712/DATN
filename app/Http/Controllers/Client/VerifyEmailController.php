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
        // Tạo URL xác minh
        $verificationUrl = URL::temporarySignedRoute(
            'account.verify.email',
            now()->addMinutes(60),  // Link sẽ hết hạn sau 60 phút
            ['user' => $user->id]
        );

        // Gửi email xác minh
        \Mail::to($user->email)->send(new \App\Mail\VerifyEmail($user, $verificationUrl));
    }

    public function verify($userId)
    {
        // Lấy thông tin người dùng từ DB
        $user = User::findOrFail($userId);

        // Kích hoạt tài khoản
        $user->status = 'active';
        $user->email_verified_at = now();
        $user->save();

        // Đăng nhập người dùng ngay sau khi xác minh thành công
        Auth::login($user);

        return redirect()->route('home')->with('status', 'Tài khoản của bạn đã được xác minh thành công!');
    }
    public function resendVerification(Request $request)
    {
        // Kiểm tra xem email có trong request không
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Lấy user từ email đã xác thực
        $user = User::where('email', $data['email'])->first();

        // Kiểm tra xem người dùng có tồn tại không và tài khoản chưa xác minh
        if ($user && $user->status == 'inactive') {
            // Tạo URL xác minh
            $verificationUrl = route('account.verify.email', ['user' => $user]);

            // Gửi lại email xác minh
            Mail::to($user->email)->send(new VerifyEmail($user, $verificationUrl));

            // Thêm thông báo thành công
            session()->flash('status', 'Email xác minh đã được gửi lại. Vui lòng kiểm tra hộp thư của bạn.');

            // Chuyển hướng về trang login
            return redirect()->route('account.show-login');
        }

        // Nếu người dùng không tồn tại hoặc đã xác minh, trả về thông báo lỗi
        return back()->with('error', 'Không tìm thấy người dùng hoặc tài khoản đã được xác minh.');
    }

}
