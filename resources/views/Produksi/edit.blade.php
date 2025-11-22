@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow border-0">
        <div class="card-header bg-warning text-white">
            <h5><i class="fas fa-edit"></i> Edit Data Produksi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('produksi.update', $produksi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Tanggal Produksi</label>
                    <input type="date" name="tanggal_produksi" class="form-control" value="{{ $produksi->tanggal_produksi }}" required>
                </div>
                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="{{ $produksi->nama_produk }}" required>
                </div>
                <div class="mb-3">
                    <label>Customer</label>
                    <input type="text" name="customer" class="form-control" value="{{ $produksi->customer }}" required>
                </div>
                <div class="mb-3">
                    <label>Target Planning</label>
                    <input type="number" name="target_planning" class="form-control" value="{{ $produksi->target_planning }}" required>
                </div>
                <div class="mb-3">
                    <label>Hasil Produksi Actual</label>
                    <input type="number" name="hasil_produksi_actual" class="form-control" value="{{ $produksi->hasil_produksi_actual }}" required>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ route('produksi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
