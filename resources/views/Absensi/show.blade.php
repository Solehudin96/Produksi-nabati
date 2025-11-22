@extends('layouts.app')

@section('title', 'Detail Absensi')

@section('content')
<div class="container py-4">
    <div class="card shadow border-0">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i> Detail Absensi</h5>
            <a href="{{ route('absensi.index') }}" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Karyawan</th>
                    <td>{{ $absensi->karyawan->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $absensi->tanggal ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($absensi->status == 'Hadir')
                            <span class="badge bg-success">Hadir</span>
                        @elseif($absensi->status == 'Izin')
                            <span class="badge bg-warning text-dark">Izin</span>
                        @elseif($absensi->status == 'Sakit')
                            <span class="badge bg-info text-dark">Sakit</span>
                        @else
                            <span class="badge bg-danger">Alpha</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Jam Masuk</th>
                    <td>{{ $absensi->jam_masuk ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jam Keluar</th>
                    <td>{{ $absensi->jam_keluar ?? '-' }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('absensi.index') }}" class="btn btn-secondary fw-bold">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
