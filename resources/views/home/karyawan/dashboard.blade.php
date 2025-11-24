@extends('layouts.app') 
@section('content')
<div class="container-fluid px-3 px-md-4 py-4">
    <div class="row justify-content-center">
            <!-- Kartu-kartu informasi -->
            <div class="row g-3">
                <!-- Kehadiran -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-calendar-check fs-1 text-primary mb-2"></i>
                            <h5 class="card-title mb-0">Kehadiran</h5>
                            <p class="text-muted mb-2">Total absensi bulan ini</p>
                            <h3 class="fw-bold text-success">{{ $hadir }} Hari</h3>
                            <a href="#" class="btn btn-outline-primary btn-sm mt-2">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <!-- Lemburan -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-clock-history fs-1 text-warning mb-2"></i>
                            <h5 class="card-title mb-0">Lemburan</h5>
                            <p class="text-muted mb-2">Total jam lembur</p>
                            <h3 class="fw-bold text-success">0 Jam</h3>
                            <a href="#" class="btn btn-outline-warning btn-sm mt-2">Ajukan Lembur</a>
                        </div>
                    </div>
                </div>

                <!-- Profil -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-person-lines-fill fs-1 text-info mb-2"></i>
                            <h5 class="card-title mb-0">Profil</h5>
                            <p class="text-muted mb-2">Lihat dan ubah data diri</p>
                            <a href="#" class="btn btn-outline-info btn-sm mt-3">Buka Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
