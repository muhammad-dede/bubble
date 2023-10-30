<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function profil()
    {
        return view('web.dashboard.akun.profil');
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

        $admin = User::findOrFail(auth()->id());
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', __('Berhasil disimpan'));
    }

    public function password()
    {
        return view('web.dashboard.akun.password');
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

        $admin = User::findOrFail(auth()->id());

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

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function pesananku()
    {
        $data_booking = Booking::where('id_user', auth()->id())->get();
        return view('web.dashboard.pesananku.index', compact('data_booking'));
    }

    public function pesananku_show($id)
    {
        $booking = Booking::where('id', $id)->where('id_user', auth()->id())->first();
        if (!$booking) {
            return abort(404);
        }
        return view('web.dashboard.pesananku.show', compact('booking'));
    }
}
