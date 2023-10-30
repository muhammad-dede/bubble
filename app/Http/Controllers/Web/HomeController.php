<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->limit(6)->get();
        return view('web.home', compact('galeris'));
    }
}
