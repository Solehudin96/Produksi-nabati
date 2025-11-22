@extends('layouts.app')

@section('title','Lemburan Menunggu Approval')

@section('content')
<div class="card shadow">
    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0"><i class="fas fa-clock me-2"></i> Lemburan Menunggu Persetujuan</h5>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-warning text-center">
                <tr>
                    <th>No</th>
                    <th>Karyawan</th>
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lemburans as $index => $l)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $l->karyawan->name }}</td>
                        <td>{{ $l->tanggal }}</td>
                        <td class="text-center">{{ $l->jam_mulai }}</td>
                        <td class="text-center">{{ $l->jam_selesai }}</td>
                        <td>{{ $l->keterangan }}</td>
                        <td class="text-center">
                            <form action="{{ route('lemburan.approve', $l->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm btn-success">Setuju</button>
                            </form>
                            <form action="{{ route('lemburan.reject', $l->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm btn-danger">Tolak</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Tidak ada lemburan menunggu persetujuan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
