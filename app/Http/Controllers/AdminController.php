<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\Lemburan;
use App\Models\Produksi;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Total semua karyawan
        $totalKaryawan = Karyawan::count();

        // Total absensi hari ini
        $absenHariIni = Absensi::whereDate('tanggal', Carbon::today())->count();

        // Total lembur bulan ini
        $totalLembur = Lemburan::whereMonth('tanggal', Carbon::now()->month)
                                ->whereYear('tanggal', Carbon::now()->year)
                                ->count();


        return view('admin.dashboard', compact(
            'totalKaryawan',
            'absenHariIni',
            'totalLembur',
        ));
    }
}
