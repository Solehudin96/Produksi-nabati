@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Profil Saya</h4>
    
    <div class="card p-3">
        <p><strong>Nama:</strong> {{ $karyawan->nama }}</p>
        <p><strong>NIK:</strong> {{ $karyawan->nik }}</p>
        <p><strong>Email Login:</strong> {{ $user->email }}</p>
        <p><strong>Jabatan:</strong> {{ $karyawan->jabatan }}</p>
    </div>
</div>
@endsection
