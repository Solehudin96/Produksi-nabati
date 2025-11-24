@extends('layouts.app')
@section('title', 'Edit Atasan')

@section('content')
<div class="card p-4 bg-white shadow-sm border-0">

    <h5 class="fw-bold text-primary mb-3">
        <i class="bi bi-pencil-square me-2"></i> Edit Atasan
    </h5>

    <form action="{{ route('atasan.update', $atasan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="fw-bold">Nama</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ $atasan->name }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="fw-bold">Email</label>
            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ $atasan->email }}"
                required
            >
        </div>

        <hr>

        <div class="d-flex justify-content-between">
            <a href="{{ route('data_atasan') }}" class="btn btn-secondary">
                Kembali
            </a>

            <button class="btn btn-primary">
                Simpan Perubahan
            </button>
        </div>
    </form>

</div>
@endsection
