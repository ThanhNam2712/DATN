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
                $message->from('tuancdph43313@fpt.adu.vn', 'Tuan Clothing');
                $message->to($email_to, $email_to);
                $message->subject("Forgot Notification");
            });

            return redirect()->back()->with([
                'message' => 'Please check your mailbox'
            ]);
        }else{
            return redirect()->back()->with([
                'message' => 'Email Not is incorrect'
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
        $user = User::where('id', '=' , $id)->first();
        if ($request->password == $request->password_confirmation){
            $user->password = Hash::make($request->password_confirmation);
            $user->save();

            return redirect('account/show-login')->with([
                'message' => 'Change Password Success, Please login again'
            ]);
        }else{
            return redirect()->back()->with([
                'message' => 'New Password does Not Match'
            ]);
        }
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
