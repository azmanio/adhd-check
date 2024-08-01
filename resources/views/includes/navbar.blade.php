@push('script')
    <script>
        function logout_confirm(url) {
            Swal.fire({
                title: "Apa Kamu Yakin?",
                text: 'Klik "Yes" untuk mengakhiri session.',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url
                }
            });
        }
    </script>
@endpush

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
            <ul class="navbar-nav ms-auto navbar-nav-scroll mx-2">
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
            @auth
                <div class="d-flex">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle nav-item text-decoration-none">
                            <span class="d-none d-lg-inline align-middle">Hi, <strong>{{ auth()->user()->nama }}</strong>!
                            </span>
                            @if (auth()->user()->image_path)
                                <img src="/storage/profile{{ auth()->user()->image_path }}" alt="Foto"
                                    class="img-profile rounded-circle mx-1"
                                    style="width: 30px; height: 30px; object-fit: cover">
                            @else
                                <img src="{{ asset('assets/admin/img/user.png') }}" alt="Foto"
                                    class="img-profile rounded-circle mx-1"
                                    style="width: 30px; height: 30px; object-fit: cover">
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            @if (@auth()->user()->role == 'admin')
                                <li>
                                    <a class="dropdown-item d-flex justify-content-between" href="{{ route('dashboard') }}">
                                        Dashboard
                                        <i class="fas fa-tachometer-alt"></i>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item d-flex justify-content-between" href="{{ route('profile.index') }}">
                                    Profile
                                    <i class="fa fa-cog"></i>
                                </a>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex justify-content-between"
                                    onclick="logout_confirm('{{ route('auth.logout') }}')">
                                    Keluar
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                @if (Route::currentRouteName() !== 'auth.login')
                    <span class="nav-item">
                        <a class="btn-solid-sm" href="{{ route('auth.login') }}">Login</a>
                    </span>
                @endif
                @if (Route::currentRouteName() !== 'auth.register')
                    <span class="nav-item">
                        <a class="btn-outline-sm" href="{{ route('auth.register') }}">Register</a>
                    </span>
                @endif
            @endauth
        </div>
    </div>
</nav>
