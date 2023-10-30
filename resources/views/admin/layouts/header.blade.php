<div class="sticky-top">
    <header class="navbar navbar-expand-md navbar-light sticky-top d-print-none">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href="{{ route('admin.home') }}">
                    <img src="{{ asset('') }}images/logo.png" width="110" height="32" alt="Tabler"
                        class="navbar-brand-image">
                </a>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                @auth
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}"
                                class="avatar avatar-sm rounded-circle" />
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ auth()->user()->name }}</div>
                                <div class="mt-1 small text-muted">
                                    {{ auth()->user()->email }}
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="{{ route('admin.akun.profil') }}" class="dropdown-item">{{ __('Profil') }}</a>
                            <a href="{{ route('admin.akun.password') }}" class="dropdown-item">{{ __('Ubah Password') }}</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('admin.logout') }}" class="dropdown-item text-danger"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </header>
    {{-- Menu --}}
    <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar navbar-light">
                <div class="container-xl">
                    <ul class="navbar-nav">
                        <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.home') }}">
                                <span class="nav-link-title">
                                    Home
                                </span>
                            </a>
                        </li>
                        @role('Super Admin')
                            <li class="nav-item {{ Request::is('admin/pengguna') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.pengguna.index') }}">
                                    <span class="nav-link-title">
                                        Pengguna
                                    </span>
                                </a>
                            </li>
                        @endrole
                        @hasanyrole('Super Admin|Admin')
                            <li class="nav-item {{ Request::is('admin/galeri') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.galeri.index') }}">
                                    <span class="nav-link-title">
                                        Galeri
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/paket') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.paket.index') }}">
                                    <span class="nav-link-title">
                                        Paket
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/client') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.client.index') }}">
                                    <span class="nav-link-title">
                                        Client
                                    </span>
                                </a>
                            </li>
                        @endhasanyrole
                        <li class="nav-item {{ Request::is('admin/booking') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.booking.index') }}">
                                <span class="nav-link-title">
                                    Booking
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/acara') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.acara.index') }}">
                                <span class="nav-link-title">
                                    Acara
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
