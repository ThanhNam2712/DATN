<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    /**
     * Gửi email reset mật khẩu.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validate email input
        $validator = Validator::make($request->all(), [
            'email' => 'email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Gửi email reset mật khẩu
        $response = Password::sendResetLink(
            $request->only('email')
        );

        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('status', 'Đã gửi email reset mật khẩu!');
        }

        return back()->withErrors(['email' => 'Có lỗi xảy ra, vui lòng thử lại sau.']);
    }
}
