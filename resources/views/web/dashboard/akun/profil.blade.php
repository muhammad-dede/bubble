@extends('web.layouts.user.main')

@section('title', 'Profil')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Profil
                    </h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Profil
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
                                        Profil Saya
                                    </h3>
                                    <div class="text-muted">
                                        Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun
                                    </div>
                                </div>
                            </div>
                            <form id="form" class="form" action="{{ route('akun.profil') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label" for="name">
                                        Nama&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') ?? auth()->user()->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label" for="email">
                                        Email&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <input type="email" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') ?? auth()->user()->email }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-footer border-top py-3">
                                    <button type="submit" class="btn btn-primary me-1">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
