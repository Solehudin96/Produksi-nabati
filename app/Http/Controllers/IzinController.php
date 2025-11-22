<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IzinController extends Controller
{
    // Karyawan melihat semua izin miliknya
    public function index()
    {
        $karyawanId = Auth::user()->karyawan->id;

        $izins = Izin::where('karyawan_id', $karyawanId)->latest()->get();

        return view('karyawan.izin.index', compact('izins'));
    }

    // Form pengajuan izin
    public function create()
    {
        return view('karyawan.izin.create');
    }

    // Karyawan mengirim pengajuan
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis' => 'required',
            'keterangan' => 'nullable',
            'file_bukti' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $fileName = null;

        if ($request->hasFile('file_bukti')) {
            $fileName = time() . '_' . $request->file_bukti->getClientOriginalName();
            $request->file_bukti->storeAs('bukti_izin', $fileName);
        }

        Izin::create([
            'karyawan_id' => Auth::user()->karyawan->id,
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'file_bukti' => $fileName,
            'status' => 'pending',
        ]);

        return redirect()->route('karyawan.izin')
            ->with('success', 'Pengajuan izin berhasil dikirim!');
    }

    // ADMIN melihat semua izin
    public function adminIndex()
    {
        $izins = Izin::with('karyawan')->latest()->get();

        return view('admin.izin.index', compact('izins'));
    }

    // ADMIN menyetujui izin
    public function approve($id)
    {
        Izin::where('id', $id)->update(['status' => 'disetujui']);
        return back()->with('success', 'Izin disetujui!');
    }

    // ADMIN menolak izin
    public function reject($id)
    {
        Izin::where('id', $id)->update(['status' => 'ditolak']);
        return back()->with('success', 'Izin ditolak!');
    }
}
