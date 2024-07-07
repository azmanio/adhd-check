<div class="sidebar sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom py-0">
        <div class="sidebar-brand">
            <img src="{{ asset('assets/img/logo-adhd-icon.png') }}" alt="" srcset=""
                class="sidebar-brand-narrow" width="32" height="32">
            <img src="{{ asset('assets/img/logo-adhd-full.png') }}" alt="" srcset=""
                class="sidebar-brand-full" height="45">
        </div>
        <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark"
            aria-label="Close"
            onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="cil-speedometer nav-icon"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-title">Kelola Data</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="cil-group nav-icon"></i>
                User
            </a>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <i class="cil-book nav-icon"></i>
                Basis Pengetahuan
            </a>
            <ul class="nav-group-items compact">
                <li class="nav-item">
                    <a class="nav-link" href="base/accordion.html">
                        <i class="cil-stream"></i>
                        <span class="px-2">
                            Kriteria
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="base/accordion.html">
                        <i class="cil-stream"></i>
                        <span class="px-2">
                            Gejala
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="base/accordion.html">
                        <i class="cil-stream"></i>
                        <span class="px-2">
                            Kategori & Solusi
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="base/accordion.html">
                        <i class="cil-stream"></i>
                        <span class="px-2">
                            Pertanyaan
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="cil-chart nav-icon"></i>
                Arsip Diagnostik
            </a>
        </li>
        <li class="nav-title">Analisis Data</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-balance-scale-right nav-icon"></i>
                Perbandingan Kriteria
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-balance-scale-right nav-icon"></i>
                Perbandingan Gejala
            </a>
        </li>
        <li class="nav-title">Layanan</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-diagnoses nav-icon"></i>
                Tes Diagnostik
            </a>
        </li>
    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
</div>
