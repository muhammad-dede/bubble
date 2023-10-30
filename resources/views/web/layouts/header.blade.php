<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <a href="{{ route('home') }}" class="logo me-auto">
            <img src="{{ asset('') }}images/logo.png" alt="" class="img-fluid">
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('galeri') }}" class="{{ Request::is('galeri') ? 'active' : '' }}">Galeri</a>
                </li>
                <li>
                    <a href="{{ route('paket') }}" class="{{ Request::is('paket') ? 'active' : '' }}">Paket</a>
                </li>
                <li>
                    <a href="{{ route('kontak') }}" class="{{ Request::is('kontak') ? 'active' : '' }}">Kontak</a>
                </li>
                @guest('web')
                    <li>
                        <a href="{{ route('login') }}" class="getstarted">Login</a>
                    </li>
                @endguest
                @auth('web')
                    <li>
                        <a href="{{ route('akun.profil') }}">{{ auth()->user()->name }}</a>
                    </li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
