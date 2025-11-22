@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow border-0">
        <div class="card-header bg-warning text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="bi bi-pencil-square me-2"></i> Edit Data Karyawan
            </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('karyawan.form')

                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-warning text-white fw-bold">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
