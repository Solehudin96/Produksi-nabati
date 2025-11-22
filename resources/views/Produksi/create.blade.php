@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-clock me-2"></i> Tambah Data Hasil Produksi</h5>
            <a href="{{ route('produksi.index') }}" class="btn white btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('produksi.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Tanggal Produksi</label>
                    <input type="date" name="tanggal_produksi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Customer</label>
                    <input type="text" name="customer" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Target Planning</label>
                    <input type="number" name="target_planning" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Hasil Produksi Actual</label>
                    <input type="number" name="hasil_produksi_actual" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('produksi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
