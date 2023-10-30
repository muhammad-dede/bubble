<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    public function showResetPasswordForm($token)
    {
        $password_reset = DB::table('password_resets')->select('email', 'token')->where('token', $token)->first();

        if (!$password_reset) {
            return abort('404');
        }

        return view('web.auth.reset-password', compact('password_reset'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|exists:user,email',
            'password' => 'required|string|min:8|confirmed',
        ], [], [
            'email' => 'Email',
            'password' => 'Password',
        ]);

        $password_reset = DB::table('password_resets')->where('token', $request->token)->where('email', $request->email)->first();

        if (!$password_reset) {
            return redirect()->back()->withErrors([
                'email' => __('Email yang Anda masukkan tidak valid dengan token reset password'),
            ])->withInput();
        }

        User::where('email', $request->email)->update([
            'password' => bcrypt($request->password),
        ]);

        DB::table('password_resets')->where('token', $request->token)->where('email', $request->email)->delete();

        return redirect()->route('login');
    }
}
