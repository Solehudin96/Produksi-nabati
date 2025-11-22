@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-box-seam nav-icon"></i> Data Hasil Produksi</h5>
                <a href="{{ route('produksi.create') }}" class="btn btn-primary btn-sm text-white">
                    <i class="bi bi-plus-circle me-1"></i> Tambah
                </a>
        </div>
        <div class="card-body">
            <!-- Search -->
            <form method="GET" action="{{ route('produksi.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama produk atau customer..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                </div>
            </form>

            <!-- Tabel -->
            <table class="table table-bordered table-hover">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Produksi</th>
                        <th>Nama Produk</th>
                        <th>Customer</th>
                        <th>Target Planning</th>
                        <th>Hasil Actual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produksis as $index => $produksi)
                        <tr>
                            <td class="text-center">{{ $produksis->firstItem() + $index }}</td>
                            <td>{{ $produksi->tanggal_produksi }}</td>
                            <td>{{ $produksi->nama_produk }}</td>
                            <td>{{ $produksi->customer }}</td>
                            <td>{{ $produksi->target_planning }}</td>
                            <td>{{ $produksi->hasil_produksi_actual }}</td>
                            <td class="text-center">
                                <a href="{{ route('produksi.edit', $produksi->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('produksi.destroy', $produksi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Tidak ada data ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $produksis->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
