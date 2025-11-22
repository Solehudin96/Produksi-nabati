@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h3 class="fw-bold text-danger">Selamat Datang, {{ Auth::user()->name }}</h3>
            <p class="text-muted">Berikut ringkasan data sistem produksi Nabati</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Data Karyawan -->
        <div class="col-md-3">
            <div class="card text-white bg-danger shadow h-100">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill fs-1 mb-2"></i>
                    <h3>{{ $karyawan ?? 0 }}</h3>
                    <p>Data Karyawan</p>
                </div>
                <div class="card-footer bg-transparent border-0 text-center">
                    <a href="{{ route('karyawan.index') }}" class="btn btn-light btn-sm fw-bold">
                        Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Data Absensi -->
        <div class="col-md-3">
            <div class="card text-white bg-success shadow h-100">
                <div class="card-body text-center">
                    <i class="bi bi-calendar-check fs-1 mb-2"></i>
                    <h3>{{ $absensi ?? 0 }}</h3>
                    <p>Data Absensi</p>
                </div>
                <div class="card-footer bg-transparent border-0 text-center">
                    <a href="{{ route('absensi.index') }}" class="btn btn-light btn-sm fw-bold">
                        Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Data Lembur -->
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow h-100">
                <div class="card-body text-center">
                    <i class="bi bi-clock-history fs-1 mb-2"></i>
                    <h3>{{ $lembur ?? 0 }}</h3>
                    <p>Data Lembur</p>
                </div>
                <div class="card-footer bg-transparent border-0 text-center">
                    <a href="{{ route('lemburan.index') }}" class="btn btn-light btn-sm fw-bold">
                        Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Data Produksi -->
        <div class="col-md-3">
            <div class="card text-dark bg-warning shadow h-100">
                <div class="card-body text-center">
                    <i class="bi bi-box-seam fs-1 mb-2"></i>
                    <h3>{{ $produksi ?? 0 }}</h3>
                    <p>Hasil Produksi</p>
                </div>
                <div class="card-footer bg-transparent border-0 text-center">
                    <a href="{{ route('produksi.index') }}" class="btn btn-dark btn-sm fw-bold">
                        Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
