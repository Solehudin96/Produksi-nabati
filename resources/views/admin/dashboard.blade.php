@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white text-center shadow">
                <div class="card-body">
                    <h5>Total Karyawan</h5>
                    <h3>{{ $totalKaryawan ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-success text-white text-center shadow">
                <div class="card-body">
                    <h5>Absensi Hari Ini</h5>
                    <h3>{{ $absenHariIni ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-warning text-white text-center shadow">
                <div class="card-body">
                    <h5>Lembur Bulan Ini</h5>
                    <h3>{{ $totalLembur ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-warning text-white text-center shadow">
                <div class="card-body">
                    <h5>Hasil Produksi</h5>
                    <h3>{{ $totalProduksi ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
