@extends('layouts.app')

@section('title', 'Detail Karyawan')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-person-lines-fill me-2"></i> Detail Karyawan</h4>
            <a href="{{ route('karyawan.index') }}" class="btn white btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <td>{{ $karyawan->nama }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>{{ $karyawan->nik }}</td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>{{ $karyawan->jabatan }}</td>
                </tr>
                <tr>
                    <th>Departemen</th>
                    <td>{{ $karyawan->departemen }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $karyawan->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>No. Telp</th>
                    <td>{{ $karyawan->no_telp }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $karyawan->alamat }}</td>
                </tr>
                <tr>
                    <th>Tanggal Masuk</th>
                    <td>{{ $karyawan->tanggal_masuk }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $karyawan->status }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
