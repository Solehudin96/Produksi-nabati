@extends('layouts.app')

@section('title', 'Tambah Absensi')

@section('content')
<div class="container py-4">
    <div class="card shadow border-0">
        <!-- Header -->
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-plus me-2"></i> Tambah Data Absensi</h5>
            <a href="{{ route('absensi.index') }}" class="btn white btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
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

            <!-- Form Input Absensi -->
            <form action="{{ route('absensi.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Karyawan</label>
                    <select name="karyawan_id" class="form-select" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach ($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }} - {{ $karyawan->nik }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jam Masuk</label>
                    <input type="time" name="jam_masuk" class="form-control" value="{{ old('jam_masuk') }}" step="60" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jam Keluar</label>
                    <input type="time" name="jam_keluar" class="form-control" value="{{ old('jam_keluar') }}" step="60" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="Hadir" {{ old('status') == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="Izin" {{ old('status') == 'Izin' ? 'selected' : '' }}>Izin</option>
                        <option value="Sakit" {{ old('status') == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="Alpha" {{ old('status') == 'Alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-success fw-bold">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('absensi.index') }}" class="btn btn-secondary fw-bold">
                        <i class="fas fa-times-circle me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
