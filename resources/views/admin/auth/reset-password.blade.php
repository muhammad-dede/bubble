@extends('admin.layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <form class="card card-md" action="{{ route('admin.password.update') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Reset Password</h2>
            <input type="hidden" name="token" value="{{ $password_reset->token }}">
            <div class="mb-2">
                <label class="form-label" for="email">
                    Email
                </label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                    value="{{ old('email') ?? $password_reset->email }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label" for="password">
                    Password Baru
                </label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Password Baru">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label" for="password_confirmation">
                    Konfirmasi Password Baru
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                    placeholder="Konfirmasi Password Baru">
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Reset Password</button>
            </div>
        </div>
    </form>
    @if (Route::has('admin.login'))
        <div class="text-center text-muted mt-3">
            <a href="{{ route('admin.login') }}">kembali ke login</a>
        </div>
    @endif
@endsection
