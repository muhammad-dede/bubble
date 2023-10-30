<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Galeri;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $count_galeri = Galeri::count();
        $count_paket = Paket::count();
        $count_client = User::count();
        $count_booking = Booking::count();
        return view('admin.home', compact('count_galeri', 'count_paket', 'count_client', 'count_booking'));
    }
}
