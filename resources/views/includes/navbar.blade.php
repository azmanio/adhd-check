<!-- Navigation -->
<nav id="navbar"
    class="navbar @if (Route::currentRouteName() !== 'home') extra-page @endif navbar-expand-lg fixed-top navbar-light"
    aria-label="Main navigation">
    <div class="container">

        <a class="navbar-brand logo-image" href="{{ route('home') }}">
            <img src="{{ asset('assets/admin/img/logo-adhd-full.png') }}" alt="alternative">
        </a>

        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ms-auto navbar-nav-scroll mx-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#header') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#details') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#contact') }}">Kontak</a>
                </li>
            </ul>
            @if (Route::currentRouteName() !== 'auth.login')
                <span class="nav-item mr-0">
                    <a class="btn-solid-sm" href="{{ route('auth.login') }}">Login</a>
                </span>
            @endif
            @if (Route::currentRouteName() !== 'auth.register')
                <span class="nav-item">
                    <a class="btn-outline-sm" href="{{ route('auth.register') }}">Register</a>
                </span>
            @endif
        </div>
    </div>
</nav>
