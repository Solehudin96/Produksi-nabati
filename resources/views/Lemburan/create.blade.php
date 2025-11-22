@extends('layouts.app')

@section('title', 'Tambah Lemburan')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow border-0">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-clock me-2"></i> Tambah Lemburan</h5>
            <a href="{{ route('lemburan.index') }}" class="btn white btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('lemburan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="karyawan_id" class="form-label">Karyawan</label>
                    <select name="karyawan_id" id="karyawan_id" class="form-select" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($karyawans as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('lemburan.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle me-1"></i> Batal
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
