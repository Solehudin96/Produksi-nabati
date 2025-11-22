@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow border-0">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-calendar-check"></i> Rekap Absensi Karyawan</h5>
        </div>

        <div class="card-body">
            <!-- 🔍 Filter Bulan & Tahun -->
            <form method="GET" action="{{ route('absensi.rekap') }}" class="row g-3 mb-4">
                <div class="col-md-3">
                    <label for="bulan" class="form-label fw-bold">Bulan</label>
                    <select name="bulan" id="bulan" class="form-select">
                        @foreach (range(1, 12) as $m)
                            <option value="{{ $m }}" {{ isset($bulan) && $bulan == $m ? 'selected' : (date('m') == $m ? 'selected' : '') }}>
                                {{ DateTime::createFromFormat('!m', $m)->format('F') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="tahun" class="form-label fw-bold">Tahun</label>
                    <select name="tahun" id="tahun" class="form-select">
                        @foreach (range(date('Y') - 3, date('Y')) as $y)
                            <option value="{{ $y }}" {{ isset($tahun) && $tahun == $y ? 'selected' : (date('Y') == $y ? 'selected' : '') }}>
                                {{ $y }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100">
                        <i class="fas fa-filter"></i> Tampilkan
                    </button>
                </div>
            </form>

            <!-- 📊 Tabel Rekap -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-success text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Hadir</th>
                            <th>Izin</th>
                            <th>Sakit</th>
                            <th>Alpha</th>
                            <th>Total Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rekap as $index => $r)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start"> {{ $r->karyawan->nama ?? '-' }}</td>
                                <td><span class="badge bg-success">{{ $r->hadir ?? 0 }}</span></td>
                                <td><span class="badge bg-warning text-dark">{{ $r->izin ?? 0 }}</span></td>
                                <td><span class="badge bg-info text-dark">{{ $r->sakit ?? 0 }}</span></td>
                                <td><span class="badge bg-danger">{{ $r->alpha ?? 0 }}</span></td>
                                <td><strong>{{ ($r->hadir ?? 0) + ($r->izin ?? 0) + ($r->sakit ?? 0) + ($r->alpha ?? 0) }}</strong></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Tidak ada data absensi bulan ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($rekap->count() > 0 && method_exists($rekap, 'links'))
            <div class="d-flex justify-content-center mt-3">
                {{ $rekap->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
