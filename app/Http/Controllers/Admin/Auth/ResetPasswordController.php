<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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

        return view('admin.auth.reset-password', compact('password_reset'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|exists:admin,email',
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

        Admin::where('email', $request->email)->update([
            'password' => bcrypt($request->password),
        ]);

        DB::table('password_resets')->where('token', $request->token)->where('email', $request->email)->delete();

        return redirect()->route('admin.login');
    }
}
