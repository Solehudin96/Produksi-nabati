@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-people-fill me-2"></i>Data Karyawan</h5>
            <a href="{{ route('karyawan.create') }}" class="btn btn-W btn-sm fw-bold">
                <i class="bi bi-plus-circle me-1"></i> Tambah Karyawan
            </a>
        </div>

        <div class="card-body">
            {{-- Alert sukses --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Form pencarian --}}
            <form method="GET" action="{{ route('karyawan.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control shadow-sm"
                        placeholder="Cari nama, NIK, jabatan, atau departemen..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </div>
            </form>

            {{-- Tabel data --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th style="width:5%">No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th style="width:20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($karyawans as $index => $karyawan)
                        <tr>
                            <td class="text-center">{{ $karyawans->firstItem() + $index }}</td>
                            <td>{{ $karyawan->nama }}</td>
                            <td>{{ $karyawan->nik }}</td>
                            <td>{{ $karyawan->jabatan }}</td>
                            <td>{{ $karyawan->departemen }}</td>
                            <td class="text-center">
                                <a href="{{ route('karyawan.show', $karyawan->id) }}" class="btn btn-info btn-sm me-1" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="bi bi-exclamation-circle"></i> Tidak ada data ditemukan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $karyawans->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
