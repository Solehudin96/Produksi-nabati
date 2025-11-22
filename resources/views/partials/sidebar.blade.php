<div class="sidebar bg-dark text-white p-3" style="min-height: 100vh;">
    <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

            <!-- Dashboard -->
            <li class="nav-item mb-2">
                <a href="{{ route('home') }}" class="nav-link text-white {{ request()->is('home') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                </a>
            </li>

            <!-- Hanya Admin -->
            @can('admin')
                <li class="nav-item mb-2">
                    <a href="{{ route('karyawan.index') }}" class="nav-link text-white {{ request()->is('karyawan*') ? 'active bg-primary' : '' }}">
                        <i class="bi bi-people me-2"></i>Data Karyawan
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="{{ route('absensi.index') }}" class="nav-link text-white {{ request()->is('absensi*') ? 'active bg-primary' : '' }}">
                        <i class="bi bi-calendar-check me-2"></i>Data Absensi
                    </a>
                </li>
            @endcan

            <!-- Admin & Atasan sama-sama bisa lihat lembur -->
            <li class="nav-item mb-2">
                <a href="{{ route('lemburan.index') }}" class="nav-link text-white {{ request()->is('lemburan*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-clock-history me-2"></i>Data Lembur
                </a>
            </li>

            <!-- Semua role bisa lihat produksi -->
            <li class="nav-item mb-2">
                <a href="{{ route('produksi.index') }}" class="nav-link text-white {{ request()->is('produksi*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-box-seam me-2"></i>Hasil Produksi
                </a>
            </li>

        </ul>
    </nav>
</div>
