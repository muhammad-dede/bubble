<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('web.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email|max:255',
            'password' => 'required|string|max:20|min:8|confirmed',
        ], [], [
            'name' => 'Nama',
            'email' => 'Email',
            'password' => 'Password',
            'password_confirmation' => 'Konfirmasi Password',
        ]);

        User::create([
            'name' => ucfirst($request->name),
            'email' => strtolower($request->email),
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login');
    }
}
