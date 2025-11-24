@extends('layouts.app')
@section('title', 'Data Karyawan')

@section('content')
<div class="card p-4 bg-white shadow-sm border-0">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold text-primary">
            <i class="bi bi-people-fill me-2"></i> Daftar Karyawan
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
                    <th>Email</th>
                    <th>Dibuat Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody class="text-center">

                @forelse ($data_lemburan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>

                        <td>

                            {{-- Tombol Edit --}}
                            <a href="{{ route('karyawan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            {{-- Tombol Delete --}}
                            <form action="{{ route('karyawan.destroy', $item->id) }}"
                                method="POST" class="d-inline"
                                onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-muted">
                            Tidak ada data atasan ditemukan
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
        <form action="{{ route('karyawan.store') }}" method="POST">
            @csrf

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <label class="fw-bold">Nama</label>
                    <input type="text" name="name" class="form-control" required>

                    <label class="fw-bold mt-3">Email</label>
                    <input type="email" name="email" class="form-control" required>

                    <label class="fw-bold mt-3">Password</label>
                    <input type="password" name="password" class="form-control" required>

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
