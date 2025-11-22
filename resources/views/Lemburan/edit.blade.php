@extends('layouts.app')

@section('title', 'Edit Lemburan')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow border-0">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-clock me-2"></i> Edit Lemburan</h5>
            <a href="{{ route('lemburan.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <!-- Pesan error validasi -->
            @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('lemburan.update', $lemburan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Pilih Karyawan -->
                <div class="mb-3">
                    <label for="karyawan_id" class="form-label fw-bold">Nama Karyawan</label>
                    <select name="karyawan_id" id="karyawan_id" class="form-select" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($karyawans as $k)
                            <option value="{{ $k->id }}" {{ $lemburan->karyawan_id == $k->id ? 'selected' : '' }}>
                                {{ $k->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal -->
                <div class="mb-3">
                    <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" 
                           value="{{ $lemburan->tanggal }}" required>
                </div>

                <!-- Jam Mulai & Jam Selesai -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="jam_mulai" class="form-label fw-bold">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" 
                               value="{{ $lemburan->jam_mulai }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="jam_selesai" class="form-label fw-bold">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" 
                               value="{{ $lemburan->jam_selesai }}" required>
                    </div>
                </div>

                <!-- Keterangan -->
                <div class="mb-3">
                    <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ $lemburan->keterangan }}</textarea>
                </div>

                <!-- Tombol aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Update
                    </button>
                    <a href="{{ route('lemburan.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
