<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /**
     * Hiển thị form yêu cầu email để gửi link reset mật khẩu.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('client.account.email_confirm');
    }

    public function postNotPass(Request $request)
    {
        $user = User::where('email', '=' ,$request->email)->first();
        if ($user){
            $user->remember_token = Str::random(40);
            $user->save();

            $email_to = $user->email;
            Mail::send('client.mail.pass', compact('user'), function ($message) use ($email_to) {
                $message->from('tuancdph43313@fpt.adu.vn', 'AE Boutique');
                $message->to($email_to, $email_to);
                $message->subject("Đặt lại mật khẩu");
            });

            return redirect()->back()->with([
                'success' => 'Vui lòng kiểm tra hộp thư Email của bạn'
            ]);
        }else{
            return redirect()->back()->with([
                'error' => 'Không gửi được Email'
            ]);
        }
    }

    public function resetPass(Request $request, $token)
    {
        $user = User::where('remember_token', '=' , $token)->first();
        return view('client.account.reset_passwords', compact('user'));
    }

    public function confirmPass(Request $request, $id)
{
    $request->validate([
        'password' => 'required|min:6|max:40|confirmed',
        'password_confirmation' => 'required',
    ], [
        'password.confirmed' => 'Mật khẩu và mật khẩu xác nhận không khớp',
    ]);

    $user = User::findOrFail($id);
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect('account/show-login')->with([
        'success' => 'Thay đổi mật khẩu thành công, vui lòng đăng nhập lại.'
    ]);
}

    /**
     * Gửi email reset mật khẩu.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */



//    public function sendResetLinkEmail(Request $request)
//    {
//        // Validate email input
//        $validator = Validator::make($request->all(), [
//            'email' => 'email|exists:users,email',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
//
//        // Gửi email reset mật khẩu
//        $response = Password::sendResetLink(
//            $request->only('email')
//        );
//
//        if ($response == Password::RESET_LINK_SENT) {
//            return back()->with('status', 'Đã gửi email reset mật khẩu!');
//        }
//
//        return back()->withErrors(['email' => 'Có lỗi xảy ra, vui lòng thử lại sau.']);
//    }
}
