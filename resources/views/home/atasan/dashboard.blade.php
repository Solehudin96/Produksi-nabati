@extends('layouts.app')
@section('title', 'Dashboard Atasan')
@section('content')
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
        <tr>
            <td>1</td>
            <td>0</td>
            <td>0</td>
            <td>ddwad</td>
            <td>dada</td>
            <td>dada</td>
            <td>
                <span class="badge bg-warning text-dark">
                0
                </span>
            </td>
            <td>
                <form action="#" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-success btn-sm">Setujui</button>
                </form>

                <form action="#" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-danger btn-sm">Tolak</button>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="8" class="text-muted">Tidak ada lembur menunggu persetujuan</td>
        </tr>
</tbody>
    </table>
</div>

@endsection
