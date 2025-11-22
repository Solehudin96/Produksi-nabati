<div class="p-3">
    <h5 class="text-white mb-4">
        <i class="bi bi-person-badge me-2"></i>Karyawan Menu
    </h5>

    <a href="{{ route('karyawan.dashboard') }}" 
       class="{{ request()->routeIs('karyawan.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i>Dashboard
    </a>

    <a href="{{ route('karyawan.profil') }}" 
       class="{{ request()->routeIs('karyawan.profil') ? 'active' : '' }}">
        <i class="bi bi-person-lines-fill me-2"></i>Profil
    </a>

    <a href="{{ route('karyawan.absensi') }}" 
       class="{{ request()->routeIs('karyawan.absensi') ? 'active' : '' }}">
        <i class="bi bi-calendar-check me-2"></i>Absensi
    </a>

    <a href="#" class="">
        <i class="bi bi-clock-history me-2"></i>Lemburan
    </a>
</div>
