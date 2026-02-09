<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Administrasi</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.0-web/css/all.min.css') }}">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body>

    <header class="navbar navbar-expand-lg navbar-dark bg-teal fixed-top nav-elevated">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('home') }}">
            <span class="brand-icon d-inline-flex align-items-center justify-content-center rounded-circle">
                <i class="fa-solid fa-layer-group"></i>
            </span>
            <span>Administrasi</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center gap-lg-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">
                        <i class="fa-solid fa-house me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.pembayaran') ? 'active' : '' }}"
                        href="{{ route('user.pembayaran') }}">
                        <i class="fa-solid fa-money-check-dollar me-1"></i> Pembayaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.pengeluaran') ? 'active' : '' }}"
                        href="{{ route('user.pengeluaran') }}">
                        <i class="fa-solid fa-arrow-trend-down me-1"></i> Pengeluaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.inventaris') ? 'active' : '' }}"
                        href="{{ route('user.inventaris') }}">
                        <i class="fa-solid fa-boxes-stacked me-1"></i> Inventaris
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

<div class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-pattern"></div>
    <div class="hero-content container">
        @yield('hero')
    </div>
</div>

<main class="main-content">
    <div class="container content-shell">
        @yield('content')
    </div>
</main>

<footer class="footer-section mt-5">
    <div class="container">
        <div class="row g-4">

            {{-- Brand --}}
            <div class="col-lg-4">
                <div class="footer-brand mb-3">
                    <i class="fa-solid fa-layer-group me-2"></i>
                    <strong>Administrasi</strong>
                </div>
                <p class="footer-text">
                    Sistem administrasi sekolah untuk membantu pengelolaan
                    pembayaran, pengeluaran, dan inventaris secara terstruktur,
                    transparan, dan mudah diakses.
                </p>
            </div>

            {{-- Menu --}}
            <div class="col-lg-4 col-md-6">
                <h6 class="footer-title">Menu Utama</h6>
                <ul class="footer-list">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('user.pembayaran') }}">Pembayaran</a></li>
                    <li><a href="{{ route('user.pengeluaran') }}">Pengeluaran</a></li>
                    <li><a href="{{ route('user.inventaris') }}">Inventaris</a></li>
                </ul>
            </div>

            {{-- Info --}}
            <div class="col-lg-4 col-md-6">
                <h6 class="footer-title">Informasi</h6>
                <ul class="footer-info">
                    <li>
                        <i class="fa-solid fa-circle-info me-2"></i>
                        Data pembayaran bersifat informatif dan menyesuaikan
                        data yang tercatat di sistem.
                    </li>
                    <li>
                        <i class="fa-solid fa-shield-halved me-2"></i>
                        Keamanan data siswa dijaga dan tidak disebarluaskan.
                    </li>
                    <li>
                        <i class="fa-solid fa-clock me-2"></i>
                        Sistem tersedia selama jam operasional sekolah.
                    </li>
                </ul>
            </div>

        </div>

        <hr class="footer-divider">

        <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <span>
                © {{ date('Y') }} Administrasi Sekolah. All rights reserved.
            </span>
            <span class="footer-small">
                Dibuat untuk keperluan administrasi internal
            </span>
        </div>
    </div>
</footer>



    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
