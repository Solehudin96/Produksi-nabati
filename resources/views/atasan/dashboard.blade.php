@extends('layouts.app')

@section('title', 'Dashboard Atasan')

@section('content')
 <!-- Tabel Notifikasi Lembur -->
    <div class="card p-4 bg-white shadow-sm border-0">
        <h5 class="mb-3 fw-bold text-danger">
            <i class="bi bi-bell-fill me-2"></i> Lemburan Menunggu Persetujuan
        </h5>

        <div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-danger text-center">
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Tanggal</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody class="text-center">
    @forelse ($lemburMenunggu as $index => $lembur)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $lembur->karyawan->nama ?? '-' }}</td>
            <td>{{ $lembur->tanggal }}</td>
            <td>{{ $lembur->jam_mulai }}</td>
            <td>{{ $lembur->jam_selesai }}</td>
            <td>{{ $lembur->keterangan }}</td>
            <td>
                <span class="badge bg-warning text-dark">
                    {{ $lembur->status_approve }}
                </span>
            </td>
            <td>
                <form action="{{ route('lembur.setujui', $lembur->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-success btn-sm">Setujui</button>
                </form>

                <form action="{{ route('lembur.tolak', $lembur->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-danger btn-sm">Tolak</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-muted">Tidak ada lembur menunggu persetujuan</td>
        </tr>
    @endforelse
</tbody>

    </table>
</div>

@endsection
