<?php

use App\Http\Controllers\Admin\AcaraController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\PenggunaController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['middleware' => 'guest:admin'], function () {
        Route::controller(LoginController::class)->group(function () {
            Route::post('login', 'authenticate')->name('login');
            Route::get('login', 'login')->name('login');
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

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'index')->name('home');
        });

        Route::resource('pengguna', PenggunaController::class)->middleware(['role:Super Admin']);
        Route::resource('galeri', GaleriController::class)->middleware(['role:Super Admin|Admin']);
        Route::resource('paket', PaketController::class)->middleware(['role:Super Admin|Admin']);
        Route::resource('client', ClientController::class)->middleware(['role:Super Admin|Admin']);

        Route::controller(BookingController::class)->group(function () {
            Route::post('booking/konfirmasi/{id}', 'konfirmasi')->name('booking.konfirmasi');
            Route::get('booking/create-acara/{id}', 'create_acara')->name('booking.create.acara');
            Route::post('booking/store-acara', 'store_acara')->name('booking.store.acara');
        });
        Route::resource('booking', BookingController::class);
        Route::resource('acara', AcaraController::class);

        Route::controller(AkunController::class)->group(function () {
            Route::get('akun/profil', 'profil')->name('akun.profil');
            Route::post('akun/profil', 'ubahProfil')->name('akun.profil');
        });

        Route::controller(AkunController::class)->group(function () {
            Route::get('akun/password', 'password')->name('akun.password');
            Route::post('akun/password', 'ubahPassword')->name('akun.password');
        });

        Route::controller(LogoutController::class)->group(function () {
            Route::post('logout', 'logout')->name('logout');
        });
    });
});
