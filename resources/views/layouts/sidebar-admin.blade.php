<div class="p-3 text-white" style="min-height: 100vh; background-color: #1e293b;">
    <h5 class="mb-4 border-bottom pb-2">
        <i class="bi bi-person-gear me-2"></i>Admin Panel
    </h5>

    <nav class="nav flex-column">

        <a href="{{ route('productions.index') }}"
           class="nav-link text-white {{ request()->routeIs('productions.*') ? 'active fw-bold bg-success rounded px-2' : '' }}">
            <i class="bi bi-box-seam me-2"></i>Data Produksi
        </a>

        <a href="{{ route('karyawan.index') }}"
           class="nav-link text-white {{ request()->routeIs('karyawan.*') ? 'active fw-bold bg-success rounded px-2' : '' }}">
            <i class="bi bi-people me-2"></i>Data Karyawan
        </a>

        <a href="{{ route('admin.users.index') }}"
           class="nav-link text-white {{ request()->routeIs('admin.users.*') ? 'active fw-bold bg-success rounded px-2' : '' }}">
            <i class="bi bi-person-lines-fill me-2"></i>Kelola User
        </a>

        <a href="{{ route('admin.lemburan.index') }}"
           class="nav-link text-white {{ request()->routeIs('admin.lemburan.*') ? 'active fw-bold bg-success rounded px-2' : '' }}">
            <i class="bi bi-clock-history me-2"></i>Data Lemburan
        </a>

        <a href="{{ route('admin.absensi.index') }}"
           class="nav-link text-white {{ request()->routeIs('admin.absensi.*') ? 'active fw-bold bg-success rounded px-2' : '' }}">
            <i class="bi bi-calendar-check me-2"></i>Data Absensi
        </a>
        <a href="{{ route('admin.produksi.index') }}"
           class="nav-link text-white {{ request()->routeIs('admin.produksi.*') ? 'active fw-bold bg-success rounded px-2' : '' }}">
            <i class="bi bi-calendar-check me-2"></i>Data Produksi
        </a>

        <hr class="text-white my-3">

        <a href="{{ route('logout') }}"
           class="nav-link text-danger"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right me-2"></i>Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>
</div>
