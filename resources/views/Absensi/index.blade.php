@extends('layouts.app')

@section('title', 'Data Absensi')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow border-0">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-calendar me-2"></i> Data Absensi</h5>
            <a href="{{ route('absensi.create') }}" class="btn btn-white btn-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah Absensi
            </a>
        </div>

        <div class="card-body">
            <!-- Form Pencarian -->
            <form method="GET" action="{{ route('absensi.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama atau NIK karyawan..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                </div>
            </form>
                <div class="d-flex gap-2">
                    <a href="{{ route('absensi.export.excel') }}" class="btn btn-success btn-sm">
                        <i class="bi bi-file-earmark-excel"></i> Export Excel
                    </a>

                    <a href="{{ route('absensi.export.pdf') }}" class="btn btn-danger btn-sm">
                        <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                    </a>
                </div>

            <!-- Tabel Data Absensi -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th style="width:5%">No</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th style="width:15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($absensis as $index => $absensi)
                            <tr>
                                <td class="text-center">{{ $absensis->firstItem() + $index }}</td>
                                <td>{{ $absensi->karyawan->nama ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($absensi->tanggal)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    @switch($absensi->status)
                                        @case('Hadir')
                                            <span class="badge bg-success">Hadir</span>
                                            @break
                                        @case('Izin')
                                            <span class="badge bg-warning text-dark">Izin</span>
                                            @break
                                        @case('Sakit')
                                            <span class="badge bg-info text-dark">Sakit</span>
                                            @break
                                        @default
                                            <span class="badge bg-danger">Alpha</span>
                                    @endswitch
                                </td>
                                <td class="text-center">{{ $absensi->jam_masuk ?? '-' }}</td>
                                <td class="text-center">{{ $absensi->jam_keluar ?? '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-3">
                                    <i class="fas fa-exclamation-circle me-1"></i> Tidak ada data absensi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $absensis->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
