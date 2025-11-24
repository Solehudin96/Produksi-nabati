    <aside class="main-sidebar sidebar-dark-danger elevation-4">
        <a href="{{ route('home') }}" class="brand-link text-center">
            <img src="{{ asset('images/nabati.png') }}" alt="Logo" width="40" class="mr-2">
            <span class="fw-bold">Nabati system</span>
        </a>

        <div class="sidebar">
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                <i class="bi bi-house-door nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    @can('admin')
                        <li class="nav-item">
                            <a href="{{ route('data_atasan') }}" class="nav-link {{ request()->is('data_atasan*') ? 'active' : '' }}">
                                <i class="bi bi-person-circle nav-icon"></i>
                                <p>Data Atasan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data_karyawan') }}" class="nav-link {{ request()->is('data_karyawan*') ? 'active' : '' }}">
                                <i class="bi bi-people nav-icon"></i>
                                <p>Data Karyawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data_absensi') }}" class="nav-link {{ request()->is('data_absensi*') ? 'active' : '' }}">
                                <i class="bi bi-calendar-check nav-icon"></i>
                                <p>Data Absensi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data_lemburan') }}" class="nav-link {{ request()->is('data_lemburan*') ? 'active' : '' }}">
                                <i class="bi bi-clock-history nav-icon"></i>
                                <p>Data Lembur</p>
                            </a>
                        </li>
                    @endcan
                    @can('atasan')
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('karyawan*') ? 'active' : '' }}">
                                <i class="bi bi-people nav-icon"></i>
                                <p>Data Karyawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('absensi*') ? 'active' : '' }}">
                                <i class="bi bi-calendar-check nav-icon"></i>
                                <p>Data Absensi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('lemburan*') ? 'active' : '' }}">
                                <i class="bi bi-clock-history nav-icon"></i>
                                <p>Data Lembur</p>
                            </a>
                        </li>
                    @endcan
                    @can('karyawan')
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('karyawan*') ? 'active' : '' }}">
                                <i class="bi bi-people nav-icon"></i>
                                <p>Absensi Saya</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('absensi*') ? 'active' : '' }}">
                                <i class="bi bi-calendar-check nav-icon"></i>
                                <p>Lemburan Saya</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('lemburan*') ? 'active' : '' }}">
                                <i class="bi bi-clock-history nav-icon"></i>
                                <p>Request Lembur</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </nav>
        </div>
    </aside>