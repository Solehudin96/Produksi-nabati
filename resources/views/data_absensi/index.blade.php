@extends('layouts.app')
@section('title', 'Data Absensi')

@section('content')
<div class="card p-4 bg-white shadow-sm border-0">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold text-primary">
            <i class="bi bi-clock-history me-2"></i> Data Absensi
        </h5>

        {{-- Tombol Tambah --}}
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCreate">
            <i class="bi bi-plus-circle"></i> Tambah
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody class="text-center">

                @forelse ($absensi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->user->name ?? '-' }}</td>

                        <td>{{ $item->tanggal }}</td>

                        <td>{{ $item->waktu_masuk ?? '-' }}</td>

                        <td>{{ $item->waktu_keluar ?? '-' }}</td>

                        <td>
                            <span class="badge bg-success">{{ ucfirst($item->status) }}</span>
                        </td>

                        <td>

                            {{-- Tombol Edit --}}
                            <a href="{{ route('absensi.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            {{-- Tombol Delete --}}
                            <form action="{{ route('absensi.destroy', $item->id) }}"
                                method="POST" class="d-inline"
                                onsubmit="return confirm('Hapus data lembur ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="text-muted">
                            Belum ada data lemburan
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

</div>

{{-- Modal Create --}}
<div class="modal fade" id="modalCreate" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Absensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    {{-- User --}}
                    <label class="fw-bold">Nama Karyawan</label>
                    <select name="user_id" class="form-control" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach ($users as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endforeach
                    </select>

                    {{-- tanggal --}}
                    <label class="fw-bold mt-3">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>

                    {{-- waktu masuk --}}
                    <label class="fw-bold mt-3">Waktu Masuk</label>
                    <input type="time" name="waktu_masuk" class="form-control">

                    {{-- waktu keluar --}}
                    <label class="fw-bold mt-3">Waktu Keluar</label>
                    <input type="time" name="waktu_keluar" class="form-control">

                    {{-- status --}}
                    <label class="fw-bold mt-3">Status</label>
                    <select name="status" class="form-control">
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                        <option value="alpha">Alpha</option>
                    </select>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </div>

        </form>
    </div>
</div>
{{-- End Modal Create --}}

@endsection
