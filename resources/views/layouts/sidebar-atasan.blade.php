<div class="p-3">
    <h5 class="text-white mb-4"><i class="bi bi-person-badge me-2"></i>Atasan Panel</h5>

    <a href="{{ route('atasan.dashboard') }}" class="{{ request()->routeIs('atasan.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i>Dashboard
    </a>

    <a href="{{ route('atasan.karyawan') }}" class="{{ request()->routeIs('atasan.karyawan') ? 'active' : '' }}">
        <i class="bi bi-people me-2"></i>Data Karyawan
    </a>

    <a href="{{ route('lemburan.index') }}" class="{{ request()->routeIs('lemburan.*') ? 'active' : '' }}">
        <i class="bi bi-clock-history me-2"></i>Data Lembur
    </a>
</div>
