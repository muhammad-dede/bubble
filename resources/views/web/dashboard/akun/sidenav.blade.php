<div class="col-lg-2 col-md-2 col-12">
    <div class="d-flex py-1 align-items-center mb-3">
        <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" class="avatar me-2" />
        <div class="flex-fill">
            <div class="font-weight-medium">{{ auth()->user()->name }}</div>
            <div class="text-muted">
                {{ auth()->user()->email }}
            </div>
        </div>
    </div>
    <div class="list-group list-group-transparent mb-3 pt-3 border-top">
        <a class="list-group-item list-group-item-action d-flex align-items-center {{ Request::is('akun/profil') ? 'active' : '' }}"
            href="{{ route('akun.profil') }}">
            {{ __('Profil') }}
        </a>
        <a class="list-group-item list-group-item-action d-flex align-items-center {{ Request::is('akun/password') ? 'active' : '' }}"
            href="{{ route('akun.password') }}">
            {{ __('Ubah Password') }}
        </a>
    </div>
</div>
