<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lemburan;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;

class LemburanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Daftar lembur
     */
    public function index()
    {
        $user = Auth::user();

        // Jika role admin → tampilkan semua
        if ($user->role === 'admin') {
            $lemburans = Lemburan::with('karyawan')
                ->orderBy('tanggal', 'desc')
                ->paginate(10);
        } else {
            // Jika role karyawan → tampilkan lembur milik sendiri
            $karyawan = Karyawan::where('user_id', $user->id)->first();
            $lemburans = Lemburan::with('karyawan')
                ->where('karyawan_id', optional($karyawan)->id)
                ->orderBy('tanggal', 'desc')
                ->paginate(10);
        }

        return view('lemburan.index', compact('lemburans'));
    }

    /**
     * Form tambah lembur (admin)
     */
    public function create()
    {
        $this->authorizeAdmin();

        // Ambil semua karyawan (urutkan berdasarkan nama)
        $karyawans = Karyawan::orderBy('nama', 'asc')->get();

        return view('lemburan.create', compact('karyawans'));
    }

    /**
     * Simpan data lembur
     */
    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Tambahkan status default
        $validated['status_approve'] = 'Menunggu';

        Lemburan::create($validated);

        return redirect()->route('lemburan.index')->with('success', 'Lemburan berhasil ditambahkan.');
    }

    /**
     * Edit lembur
     */
    public function edit($id)
    {
        $this->authorizeAdmin();

        $lemburan = Lemburan::findOrFail($id);
        $karyawans = Karyawan::orderBy('nama', 'asc')->get();

        return view('lemburan.edit', compact('lemburan', 'karyawans'));
    }

    /**
     * Update lembur
     */
    public function update(Request $request, $id)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $lemburan = Lemburan::findOrFail($id);
        $lemburan->update($validated);

        return redirect()->route('lemburan.index')->with('success', 'Lemburan berhasil diperbarui.');
    }

    /**
     * Hapus lembur
     */
    public function destroy($id)
    {
        $this->authorizeAdmin();

        Lemburan::findOrFail($id)->delete();

        return redirect()->route('lemburan.index')->with('success', 'Lemburan berhasil dihapus.');
    }

    /**
     * Setujui lembur
     */
    public function approve($id)
    {
        $this->authorizeAdmin();

        Lemburan::findOrFail($id)->update(['status_approve' => 'Disetujui']);

        return redirect()->route('lemburan.index')->with('success', 'Lemburan disetujui.');
    }

    /**
     * Tolak lembur
     */
    public function reject($id)
    {
        $this->authorizeAdmin();

        Lemburan::findOrFail($id)->update(['status_approve' => 'Ditolak']);

        return redirect()->route('lemburan.index')->with('success', 'Lemburan ditolak.');
    }

    /**
     * Cek role admin
     */
    private function authorizeAdmin()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }
    }
}
