@extends('layouts.app')
@section('title', 'Edit Karyawan')

@section('content')
<div class="card p-4 bg-white shadow-sm border-0">

    <h5 class="fw-bold text-primary mb-3">
        <i class="bi bi-pencil-square me-2"></i> Edit Karyawan
    </h5>

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="fw-bold">Nama</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ $karyawan->name }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="fw-bold">Email</label>
            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ $karyawan->email }}"
                required
            >
        </div>

        <hr>

        <div class="d-flex justify-content-between">
            <a href="{{ route('data_karyawan') }}" class="btn btn-secondary">
                Kembali
            </a>

            <button class="btn btn-primary">
                Simpan Perubahan
            </button>
        </div>
    </form>

</div>
@endsection
