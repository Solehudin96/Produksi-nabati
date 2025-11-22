<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistem Produksi Nabati')</title>

    <!-- Bootstrap & AdminLTE -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
        .brand-link { background-color: #dc3545 !important; color: white !important; }
        .nav-link.active { background-color: #dc3545 !important; color: white !important; }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <i class="bi bi-person-circle fs-5"></i> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-danger elevation-4">
        <a href="{{ route('home') }}" class="brand-link text-center">
            <img src="{{ asset('images/nabati.png') }}" alt="Logo" width="40" class="mr-2">
            <span class="fw-bold">Nabati system</span>
        </a>

        <div class="sidebar">
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                    {{-- Menu untuk Admin --}}
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                <i class="bi bi-house-door nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('usesr*') ? 'active' : '' }}">
                                <i class="bi bi-person-circle nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('karyawan.index') }}" class="nav-link {{ request()->is('karyawan*') ? 'active' : '' }}">
                                <i class="bi bi-people nav-icon"></i>
                                <p>Data Karyawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('absensi.index') }}" class="nav-link {{ request()->is('absensi*') ? 'active' : '' }}">
                                <i class="bi bi-calendar-check nav-icon"></i>
                                <p>Data Absensi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('absensi.rekap') }}" class="nav-link">                   
                                <p>Rekap Absensi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lemburan.index') }}" class="nav-link {{ request()->is('lemburan*') ? 'active' : '' }}">
                                <i class="bi bi-clock-history nav-icon"></i>
                                <p>Data Lembur</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('produksi.index') }}" class="nav-link {{ request()->is('produksi*') ? 'active' : '' }}">
                                <i class="bi bi-box-seam nav-icon"></i>
                                <p>Hasil Produksi</p>
                            </a>
                        </li>
                    @endif
                    {{-- Menu untuk Atasan --}}
                    @if(Auth::user()->role === 'atasan')
                        <li class="nav-item">
                            <a href="{{ route('atasan.dashboard') }}" class="nav-link {{ request()->is('atasan/dashboard') ? 'active' : '' }}">
                                <i class="bi bi-house-door nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('produksi.index') }}" class="nav-link {{ request()->is('produksi*') ? 'active' : '' }}">
                                <i class="bi bi-box-seam nav-icon"></i>
                                <p>Hasil Produksi</p>
                            </a>
                        </li>
                    @endif

                    {{-- Menu untuk Karyawan --}}
                    @if(Auth::user()->role === 'karyawan')
                        <li class="nav-item">
                            <a href="{{ route('karyawan.dashboard') }}" class="nav-link {{ request()->is('karyawan/dashboard') ? 'active' : '' }}">
                                <i class="bi bi-house-door nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('karyawan.absensi') }}" class="nav-link {{ request()->is('karyawan/absensi') ? 'active' : '' }}">
                                <i class="bi bi-calendar-check nav-icon"></i>
                                <p>Absensi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('karyawan.lembur') }}" class="nav-link {{ request()->is('karyawan/lembur') ? 'active' : '' }}">
                                <i class="bi bi-clock-history nav-icon"></i>
                                <p>Lemburan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('karyawan.profil') }}" class="nav-link {{ request()->is('karyawan/profil') ? 'active' : '' }}">
                                <i class="bi bi-person-circle nav-icon"></i>
                                <p>Profil Saya</p>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content -->
    <div class="content-wrapper p-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="main-footer text-center py-2">
        <small>© 2025 Sistem Produksi Nabati</small>
    </footer>

</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
