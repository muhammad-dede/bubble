<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function profil()
    {
        return view('admin.akun.profil');
    }

    public function ubahProfil(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|unique:admin,email,' . auth()->id() . ',id',
        ], [], [
            'name' => 'Nama',
            'email' => 'Email',
        ]);

        $admin = Admin::findOrFail(auth()->id());
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', __('Berhasil disimpan'));
    }

    public function password()
    {
        return view('admin.akun.password');
    }

    public function ubahPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ], [], [
            'current_password' => __('Password'),
            'password' => __('Password Baru'),
        ]);

        $admin = Admin::findOrFail(auth()->id());

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors([
                'current_password' => 'Password yang Anda masukan salah',
            ])->withInput();
        }

        $admin->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', __('Berhasil disimpan'));
    }
}
