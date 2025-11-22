<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\RekapAbsensiExport;
use Maatwebsite\Excel\Facades\Excel;


class AbsensiController extends Controller
{
    /**
     * Menampilkan daftar absensi dengan pencarian.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $absensis = Absensi::with('karyawan')
            ->when($search, function ($query, $search) {
                $query->whereHas('karyawan', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                      ->orWhere('nik', 'like', "%{$search}%");
                });
            })
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('absensi.index', compact('absensis', 'search'));
    }

    /**
     * Menampilkan form tambah absensi.
     */
    public function create()
    {
        $karyawans = Karyawan::orderBy('nama')->get();
        return view('absensi.create', compact('karyawans'));
    }

    /**
     * Menyimpan data absensi baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'status' => 'required|string|max:20',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i|after_or_equal:jam_masuk',
        ], [
            'jam_keluar.after_or_equal' => 'Jam keluar harus setelah atau sama dengan jam masuk.',
        ]);

        // Simpan data
        Absensi::create($validated);

        return redirect()->route('absensi.index')
                         ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit absensi.
     */
    public function edit($id)
    {
        $absensi = Absensi::with('karyawan')->findOrFail($id);
        $karyawans = Karyawan::orderBy('nama')->get();

        return view('absensi.edit', compact('absensi', 'karyawans'));
    }

    /**
     * Update data absensi.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'status' => 'required|string|max:20',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i|after_or_equal:jam_masuk',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($validated);

        return redirect()->route('absensi.index')
                         ->with('success', 'Data absensi berhasil diperbarui.');
    }

    /**
     * Hapus data absensi.
     */
    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('absensi.index')
                         ->with('success', 'Data absensi berhasil dihapus.');
    }

    /**
     * Rekap absensi per bulan.
     */
    public function rekapBulanan(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');

        $rekap = Absensi::select(
                'karyawan_id',
                DB::raw("SUM(CASE WHEN status = 'Hadir' THEN 1 ELSE 0 END) as hadir"),
                DB::raw("SUM(CASE WHEN status = 'Izin' THEN 1 ELSE 0 END) as izin"),
                DB::raw("SUM(CASE WHEN status = 'Sakit' THEN 1 ELSE 0 END) as sakit"),
                DB::raw("SUM(CASE WHEN status = 'Alpha' THEN 1 ELSE 0 END) as alpha")
            )
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->groupBy('karyawan_id')
            ->with('karyawan')
            ->orderBy('karyawan_id')
            ->paginate(20);

        return view('absensi.rekap', compact('rekap', 'bulan', 'tahun'));
    }

    /**
     * Rekap Harian (semua karyawan dalam 1 hari)
     */
    public function rekapHarian(Request $request)
    {
        $tanggal = $request->tanggal ?? date('Y-m-d');

        $rekap = Absensi::with('karyawan')
            ->whereDate('tanggal', $tanggal)
            ->orderBy('karyawan_id')
            ->get();

        return view('absensi.rekap_harian', compact('rekap', 'tanggal'));
    }

    /**
     * Rekap Lengkap Bulanan (semua data harian)
     */
    public function rekapSemua(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');

        $rekap = Absensi::with('karyawan')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->orderBy('tanggal')
            ->orderBy('karyawan_id')
            ->get();

        return view('absensi.rekap_semua', compact('rekap', 'bulan', 'tahun'));
    }

    /**
     * Detail absensi.
     */
    public function show($id)
    {
        $absensi = Absensi::with('karyawan')->findOrFail($id);
        return view('absensi.show', compact('absensi'));
    }

    /**
     * Ekspor data absensi.
     */
    public function exportExcel()
    {
        return Excel::download(new RekapAbsensiExport, 'rekap_absensi.xlsx');
    }

    public function exportPDF()
    {
        $absensis = Absensi::with('karyawan')->get();

        $pdf = Pdf::loadView('absensi.pdf', compact('absensis'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download('rekap_absensi.pdf');
    }
}
