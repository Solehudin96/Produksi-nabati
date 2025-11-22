@extends('layouts.app')

@section('title', 'Data Lemburan')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow border-0">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-clock-history me-2"></i> Data Lemburan</h5>
            @if(Auth::user()->role === 'admin')
            <a href="{{ route('lemburan.create') }}" class="btn btn-white btn-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah Lemburan
            </a>
            @endif
        </div>

        <div class="card-body">
            <!-- Form Pencarian Opsional -->
            <form method="GET" action="{{ route('lemburan.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama karyawan..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                </div>
            </form>

            <!-- Tabel Data Lemburan -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th style="width:5%">No</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Status</th>
                            @if(Auth::user()->role === 'admin')
                            <th style="width:20%">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($lemburans as $index => $l)
                        <tr>
                            <td class="text-center">{{ $lemburans->firstItem() + $index }}</td>
                            <td>{{ $l->karyawan->nama ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($l->tanggal)->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $l->jam_mulai ?? '-' }}</td>
                            <td class="text-center">{{ $l->jam_selesai ?? '-' }}</td>
                            <td class="text-center">
                                @switch($l->status_approve)
                                    @case('Menunggu')
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                        @break
                                    @case('Disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                        @break
                                    @case('Ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                        @break
                                @endswitch
                            </td>
                            @if(Auth::user()->role === 'admin')
                            <td class="text-center">
                                <a href="{{ route('lemburan.edit', $l->id) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('lemburan.destroy', $l->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @if($l->status_approve == 'Menunggu')
                                    <form action="{{ route('lemburan.approve', $l->id) }}" method="POST" class="d-inline">
                                        @csrf @method('PUT')
                                        <button class="btn btn-success btn-sm" title="Setuju"><i class="fas fa-check"></i></button>
                                    </form>
                                    <form action="{{ route('lemburan.reject', $l->id) }}" method="POST" class="d-inline">
                                        @csrf @method('PUT')
                                        <button class="btn btn-secondary btn-sm" title="Tolak"><i class="fas fa-times"></i></button>
                                    </form>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ Auth::user()->role === 'admin' ? 7 : 6 }}" class="text-center text-muted py-3">
                                <i class="fas fa-exclamation-circle me-1"></i> Tidak ada data lemburan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $lemburans->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
