<?php

use App\Http\Controllers\Web\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Auth\RegisterController;
use App\Http\Controllers\Web\Auth\ResetPasswordController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\GaleriController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\KontakController;
use App\Http\Controllers\Web\PaketController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(GaleriController::class)->group(function () {
    Route::get('/galeri', 'index')->name('galeri');
});

Route::controller(PaketController::class)->group(function () {
    Route::get('/paket', 'index')->name('paket');
});

Route::controller(KontakController::class)->group(function () {
    Route::get('/kontak', 'index')->name('kontak');
});

Route::group(['middleware' => 'guest:web'], function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'showFormLogin')->name('login');
        Route::post('/login', 'authenticate')->name('login');
    });

    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::get('forgot-password', 'showForgotPasswordForm')->name('password.request');
        Route::post('forgot-password', 'sendResetLink')->name('password.email');
    });

    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('reset-password/{token}', 'showResetPasswordForm')->name('password.reset');
        Route::post('reset-password', 'resetPassword')->name('password.update');
    });
});

Route::group(['middleware' => 'auth:web'], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('pesananku', 'pesananku')->name('pesananku');
        Route::get('pesananku/{id}', 'pesananku_show')->name('pesananku.show');
        Route::get('akun/profil', 'profil')->name('akun.profil');
        Route::post('akun/profil', 'ubahProfil')->name('akun.profil');
        Route::get('akun/password', 'password')->name('akun.password');
        Route::post('akun/password', 'ubahPassword')->name('akun.password');
        Route::post('logout', 'logout')->name('logout');
    });
});

require __DIR__ . '/admin.php';
