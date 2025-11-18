<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.0-web/css/all.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3" id="sidebar" style="background-color: grey;">
            <h4 class="mb-4 text-white text-center">
                <a href="{{route('dashboard')}}" class="navbar-brand">Administrasi</a>
            </h4>

            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-gauge me-2"></i> Dashboard
                    </a>
                </li>

                <!-- Kelompok 1: Data Umum -->
                <h6 class="text-light text-uppercase mt-3 mb-2">Siswa</h6>
                <li class="nav-item"><a class="nav-link" href="{{ route('siswa') }}"><i class="fa-solid fa-users me-2"></i>Data Siswa</a></li>

                <!-- Kelompok 2: Data Keuangan -->
                <h6 class="text-light text-uppercase mt-3 mb-2">Keuangan</h6>
                <li class="nav-item"><a class="nav-link" href="{{ route('pembayaran.index') }}"><i class="fa-solid fa-credit-card me-2"></i> Pembayaran</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pengeluaran.index') }}"><i class="fa-solid fa-wallet me-2"></i> Pengeluaran</a></li>

                <!-- Kelompok 3: Inventarisasi -->
                <h6 class="text-light text-uppercase mt-3 mb-2">Inventaris</h6>
                <li class="nav-item"><a class="nav-link" href="{{ route('inventaris.index') }}"><i class="fa-solid fa-box me-2"></i>Data Inventaris</a></li>

                <!-- Kelompok 4: Profil -->
                <h6 class="text-light text-uppercase mt-3 mb-2">Profil</h6>
                <li class="nav-item"><a class="nav-link" href="{{ route('profil') }}"><i class="fa-solid fa-user me-2"></i> Profil</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="content flex-grow-1">
            <!-- Topbar -->
            <div class="topbar">
                <div class="d-flex align-items-center">
                    <!-- Tombol Hamburger -->
                    <button class="btn btn-outline-secondary d-md-none me-3" id="sidebarToggle">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <h2 class="fw-semibold mb-0"></h2>
                </div>

                <!-- Profil kanan atas -->
                <div class="d-flex align-items-center">

                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none text-dark dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ asset('storage/img/pp.png') }}" width="40" height="40" class="rounded-circle border border-light me-2" alt="User">
                            <span>{{ $user['nama_guru'] }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li><a class="dropdown-item" href="{{ route('profil') }}"><i class="fa-solid fa-user me-2"></i> Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item text-danger">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="row p-3">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebarToggle');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });
    </script>
</body>
</html>
