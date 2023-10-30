@extends('web.layouts.user.main')

@section('title', 'Ubah Password')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Ubah Password
                    </h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Ubah Password
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row g-4">
                @include('web.dashboard.akun.sidenav')
                <div class="col-lg-10 col-md-10 col-12">
                    <div class="card">
                        <div class="card-status-top bg-primary"></div>
                        <div class="card-body">
                            <div class="row align-items-center mb-3 pb-3 border-bottom">
                                <div class="col">
                                    <h3 class="card-title mb-1">
                                        Ubah Password
                                    </h3>
                                    <div class="text-muted">
                                        Untuk keamanan akun Anda, mohon untuk tidak menyebarkan password Anda ke orang lain.
                                    </div>
                                </div>
                            </div>
                            <form id="form" class="form" action="{{ route('akun.password') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label" for="current_password">
                                        Password Saat Ini&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <input type="password" name="current_password" id="current_password"
                                            class="form-control @error('current_password') is-invalid @enderror">
                                        @error('current_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label" for="password">
                                        Password Baru&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="form-hint">
                                            Kata sandi harus terdiri dari 8-20 karakter, berisi huruf dan angka, dan
                                            tidak boleh mengandung spasi, karakter khusus, atau emoji.
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label" for="password_confirmation">
                                        Konfirmasi Password Baru&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-footer border-top py-3">
                                    <button type="submit" class="btn btn-primary me-1">{{ __('Simpan') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
