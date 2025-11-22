        <div class="sidebar">
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                            <i class="bi bi-speedometer2 nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
    
                    <!-- Data Karyawan -->
                     @can('admin')
                    <li class="nav-item">
                        <a href="{{ route('karyawan.index') }}" class="nav-link {{ request()->is('karyawan*') ? 'active' : '' }}">
                            <i class="bi bi-people nav-icon"></i>
                            <p>Data Karyawan</p>
                        </a>
                    </li>
                    

                    <!-- Data Absensi -->
                    <li class="nav-item">
                        <a href="{{ route('absensi.index') }}" class="nav-link {{ request()->is('absensi*') ? 'active' : '' }}">
                            <i class="bi bi-calendar-check nav-icon"></i>
                            <p>Data Absensi</p>
                        </a>
                    </li>

                    <!-- Data Lembur -->
                    <li class="nav-item">
                        <a href="{{ route('lemburan.index') }}" class="nav-link {{ request()->is('lemburan*') ? 'active' : '' }}">
                            <i class="bi bi-clock-history nav-icon"></i>
                            <p>Data Lembur</p>
                        </a>
                    </li>
                    @endcan
                    <!-- Hasil Produksi -->
                    <li class="nav-item">
                        <a href="{{ route('produksi.index') }}" class="nav-link {{ request()->is('produksi*') ? 'active' : '' }}">
                            <i class="bi bi-box-seam nav-icon"></i>
                            <p>Hasil Produksi</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>