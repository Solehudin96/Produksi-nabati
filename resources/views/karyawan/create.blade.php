@extends('layouts.app')

@section('title', 'Tambah Karyawan')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <!-- Header -->
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="bi bi-person-plus-fill me-2"></i> Tambah Data Karyawan
            </h4>
            <a href="{{ route('karyawan.index') }}" class="btn btn-white btn-sm fw-bold">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <!-- Notifikasi Error -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Input -->
            <form action="{{ route('karyawan.store') }}" method="POST">
                @csrf

                <!-- Include form fields -->
                @include('karyawan.form')

                <div class="mt-4 d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-success fw-bold">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary fw-bold">
                        <i class="bi bi-x-circle"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
