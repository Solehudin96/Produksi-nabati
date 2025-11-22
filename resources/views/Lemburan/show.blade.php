@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Lemburan</h1>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            Lemburan {{ $lemburan->karyawan->name }}
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Karyawan:</strong> {{ $lemburan->karyawan->name }}
            </div>

            <div class="mb-3">
                <strong>Tanggal:</strong> {{ $lemburan->tanggal }}
            </div>

            <div class="mb-3">
                <strong>Jam Mulai:</strong> {{ $lemburan->jam_mulai }}
            </div>

            <div class="mb-3">
                <strong>Jam Selesai:</strong> {{ $lemburan->jam_selesai }}
            </div>

            <div class="mb-3">
                <strong>Keterangan:</strong> {{ $lemburan->keterangan ?? '-' }}
            </div>

            <div class="mb-3">
                <strong>Status:</strong>
                @if($lemburan->status_approve == 'Menunggu')
                    <span class="badge bg-warning text-dark">{{ $lemburan->status_approve }}</span>
                @elseif($lemburan->status_approve == 'Disetujui')
                    <span class="badge bg-success">{{ $lemburan->status_approve }}</span>
                @else
                    <span class="badge bg-secondary">{{ $lemburan->status_approve }}</span>
                @endif
            </div>

            @if(Auth::user()->role === 'admin' && $lemburan->status_approve == 'Menunggu')
                <form action="{{ route('lemburan.approve', $lemburan->id) }}" method="POST" class="d-inline">
                    @csrf @method('PUT')
                    <button class="btn btn-success btn-sm">Setuju</button>
                </form>
                <form action="{{ route('lemburan.reject', $lemburan->id) }}" method="POST" class="d-inline">
                    @csrf @method('PUT')
                    <button class="btn btn-secondary btn-sm">Tolak</button>
                </form>
            @endif

            <a href="{{ route('lemburan.index') }}" class="btn btn-secondary btn-sm mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
