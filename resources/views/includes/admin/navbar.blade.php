@push('script')
    <script>
        function logout_confirm(formId) {
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
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endpush

<div class="container-fluid border-bottom px-4">
    <button class="header-toggler" type="button"
        onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"
        style="margin-inline-start: -14px;">
        <svg class="icon icon-lg">
            <use xlink:href="{{ asset('assets/admin/node_modules/@coreui/icons/sprites/free.svg#cil-menu') }}"></use>
        </svg>
    </button>
    <ul class="header-nav">
        <li class="nav-item dropdown">
            <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button"
                aria-expanded="false" data-coreui-toggle="dropdown">
                <svg class="icon icon-lg theme-icon-active">
                    <use
                        xlink:href="{{ asset('assets/admin/node_modules/@coreui/icons/sprites/free.svg#cil-contrast') }}">
                    </use>
                </svg>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
                <li>
                    <button class="dropdown-item d-flex align-items-center" type="button"
                        data-coreui-theme-value="light">
                        <svg class="icon icon-lg me-3">
                            <use
                                xlink:href="{{ asset('assets/admin/node_modules/@coreui/icons/sprites/free.svg#cil-sun') }}">
                            </use>
                        </svg>Light
                    </button>
                </li>
                <li>
                    <button class="dropdown-item d-flex align-items-center" type="button"
                        data-coreui-theme-value="dark">
                        <svg class="icon icon-lg me-3">
                            <use
                                xlink:href="{{ asset('assets/admin/node_modules/@coreui/icons/sprites/free.svg#cil-moon') }}">
                            </use>
                        </svg>Dark
                    </button>
                </li>
                <li>
                    <button class="dropdown-item d-flex align-items-center active" type="button"
                        data-coreui-theme-value="auto">
                        <svg class="icon icon-lg me-3">
                            <use
                                xlink:href="{{ asset('assets/admin/node_modules/@coreui/icons/sprites/free.svg#cil-contrast') }}">
                            </use>
                        </svg>Auto
                    </button>
                </li>
            </ul>
        </li>
        <li class="nav-item py-1">
            <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md">
                    @if (auth()->user()->image_path)
                        <img src="/storage/{{ auth()->user()->image_path }}" alt="Foto" class="avatar-img">
                    @else
                        <img src="{{ asset('assets/admin/img/avatars/2.jpg') }}" alt="Foto" class="avatar-img">
                    @endif
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2">
                    Account</div>
                <a class="dropdown-item" href="{{ route('home') }}">
                    <div class="me-2">
                        <i class="cil-home icon"></i>
                        <span class="mx-2">Home</span>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="me-2">
                        <i class="cil-user icon"></i>
                        <span class="mx-2">Profile</span>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <button class="dropdown-item" onclick="logout_confirm('logout-form')">
                    <i class="cil-account-logout icon"></i>
                    <span class="mx-2">Logout</span>
                </button>
            </div>
        </li>
    </ul>
</div>
