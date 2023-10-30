<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('web.auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:user,email'], [], [
            'email' => 'Email',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->where('email', $request->email)->limit(1)->updateOrInsert(['email' => $request->email], [
            'email' => strtolower($request->email),
            'token' => $token,
            'created_at' => now(),
        ]);

        $reset_link = route('password.reset', ['token' => $token]);

        Mail::send('admin.mail.forgot-password', ['token' => $token, 'reset_link' => $reset_link], function ($message) use ($request) {
            $message->from('noreply@bubblewo.com', config('app.name'));
            $message->to($request->email);
            $message->subject(__('Pengaturan Ulang Kata Sandi/Password'));
        });

        return redirect()->back()->with('success', 'Kami telah mengirimkan tautan setel ulang kata sandi Anda melalui email');
    }
}
