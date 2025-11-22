@extends('layouts.app')

@section('title', 'Edit Absensi')

@section('content')
<div class="container py-4">
    <div class="card shadow border-0">
        <!-- Header -->
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-edit me-2"></i> Edit Data Absensi</h5>
            <a href="{{ route('absensi.index') }}" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <!-- Notifikasi Error -->
            @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Edit Absensi -->
            <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="karyawan_id" class="form-label fw-bold">Nama Karyawan</label>
                        <select name="karyawan_id" id="karyawan_id" class="form-select" required>
                            <option value="">-- Pilih Karyawan --</option>
                            @foreach ($karyawans as $karyawan)
                                <option value="{{ $karyawan->id }}" {{ old('karyawan_id', $absensi->karyawan_id) == $karyawan->id ? 'selected' : '' }}>
                                    {{ $karyawan->nama }} - {{ $karyawan->nik }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', $absensi->tanggal) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="jam_masuk" class="form-label fw-bold">Jam Masuk</label>
                        <input type="time" name="jam_masuk" id="jam_masuk" class="form-control" value="{{ old('jam_masuk', $absensi->jam_masuk) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="jam_keluar" class="form-label fw-bold">Jam Keluar</label>
                        <input type="time" name="jam_keluar" id="jam_keluar" class="form-control" value="{{ old('jam_keluar', $absensi->jam_keluar) }}">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="status" class="form-label fw-bold">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            @foreach (['Hadir','Izin','Sakit','Alpha'] as $status)
                                <option value="{{ $status }}" {{ old('status', $absensi->status) == $status ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('absensi.index') }}" class="btn btn-secondary fw-bold">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-warning text-dark fw-bold">
                        <i class="fas fa-save me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
