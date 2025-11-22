@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow border-0">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0"><i class="bi bi-envelope-paper"></i> Form Pengajuan Izin / Sakit</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('karyawan.izin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Jenis Pengajuan</label>
                    <select name="jenis" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Keterangan</label>
                    <textarea name="keterangan" rows="3" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Upload Surat (opsional)</label>
                    <input type="file" name="file_bukti" class="form-control">
                    <small class="text-muted">PDF/JPG/PNG maksimal 2MB</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('karyawan.absensi') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>

                    <button type="submit" class="btn btn-warning text-dark">
                        <i class="bi bi-send"></i> Kirim Pengajuan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
