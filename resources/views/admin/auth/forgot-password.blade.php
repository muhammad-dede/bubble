@extends('admin.layouts.auth')

@section('title', 'Lupa Password')

@section('content')
    <form class="card card-md" action="{{ route('admin.password.email') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Lupa Password</h2>
            <p class="text-muted mb-4">
                Masukkan email Anda dan kami akan mengirimkan instruksi untuk mengatur ulang password Anda
            </p>
            @if (Session::has('success'))
                <p class="text-success mb-3">
                    {{ Session::get('success') }}
                </p>
            @endif
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-footer">
                <button class="btn btn-primary w-100" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <rect x="3" y="5" width="18" height="14" rx="2" />
                        <polyline points="3 7 12 13 21 7" />
                    </svg>
                    Kirim
                </button>
            </div>
        </div>
    </form>
    @if (Route::has('admin.login'))
        <div class="text-center text-muted mt-3">
            <a href="{{ route('admin.login') }}">kembali ke login</a>
        </div>
    @endif
@endsection
