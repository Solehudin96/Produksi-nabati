<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\Lemburan;
use App\Models\Produksi;

class AtasanController extends Controller
{
    public function index()
    {
        // Ambil data lembur yang menunggu persetujuan
        $lemburMenunggu = Lemburan::with('karyawan')
            ->where('status_approve', 'Menunggu')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('atasan.dashboard', compact('lemburMenunggu'));
    }

    public function setujui($id)
    {
        $lembur = Lemburan::findOrFail($id);
        $lembur->update(['status_approve' => 'Disetujui']);
        return redirect()->back()->with('success', 'Lembur telah disetujui.');
    }

    public function tolak($id)
    {
        $lembur = Lemburan::findOrFail($id);
        $lembur->update(['status_approve' => 'Ditolak']);
        return redirect()->back()->with('success', 'Lembur telah ditolak.');
    }
}
