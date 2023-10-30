@extends('admin.layouts.auth')

@section('title', 'Login')

@section('content')
    <form class="card card-md" action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Login</h2>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" autocomplete="off" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label">
                    Password
                    @if (Route::has('admin.password.request'))
                        <span class="form-label-description">
                            <a href="{{ route('admin.password.request') }}">Lupa Password</a>
                        </span>
                    @endif
                </label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Password" autocomplete="off">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input"
                        {{ old('remember') ? 'checked' : '' }} />
                    <span class="form-check-label">Ingat Saya</span>
                </label>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>
        </div>
    </form>
@endsection
