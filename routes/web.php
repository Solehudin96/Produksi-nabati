<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AtasanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LemburanController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\UserController;

// ============================================================
// 🔹 Redirect Root ke Login
// ============================================================
Route::get('/', fn() => redirect()->route('login'));

// ============================================================
// 🔹 Auth Routes (Login, Register, Logout, dll.)
// ============================================================
Auth::routes();

// ============================================================
// 🔹 Home (Redirect ke Dashboard Berdasarkan Role)
// ============================================================
Route::get('/home', [HomeController::class, 'index'])->name('home');

// ============================================================
// 🔒 Semua route di bawah ini butuh login
// ============================================================
Route::middleware(['auth'])->group(function () {

    // ============================================================
    // 🔸 ADMIN SECTION
    // ============================================================
    Route::middleware('can:admin')->group(function () {
        // Dashboard
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        // Kelola User
        Route::resource('users', UserController::class);

        // Data Karyawan
        Route::resource('karyawan', KaryawanController::class);

        // Data Absensi
        Route::prefix('absensi')->group(function () {
            Route::get('/', [AbsensiController::class, 'index'])->name('absensi.index');
            Route::get('/create', [AbsensiController::class, 'create'])->name('absensi.create');
            Route::post('/', [AbsensiController::class, 'store'])->name('absensi.store');
            Route::get('/{id}', [AbsensiController::class, 'show'])->name('absensi.show');
            Route::get('/{id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
            Route::put('/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
            Route::delete('/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');
            Route::get('/rekap', [AbsensiController::class, 'rekap'])->name('absensi.rekap');
            Route::get('/absensi/rekap', [AbsensiController::class, 'rekapBulanan'])->name('absensi.rekap');
            Route::get('/absensi/harian', [AbsensiController::class, 'rekapHarian'])->name('absensi.harian');
            Route::get('/absensi/rekap-semua', [AbsensiController::class, 'rekapSemuaKaryawan'])->name('absensi.rekap_semua');
            Route::get('/absensi/export/excel', [AbsensiController::class, 'exportExcel']) ->name('absensi.export.excel');
            Route::get('/absensi/export/pdf', [AbsensiController::class, 'exportPDF']) ->name('absensi.export.pdf');

        });

        // Data Lemburan
        Route::prefix('lemburan')->group(function () {
            Route::get('/', [LemburanController::class, 'index'])->name('lemburan.index');
            Route::get('/create', [LemburanController::class, 'create'])->name('lemburan.create');
            Route::post('/', [LemburanController::class, 'store'])->name('lemburan.store');
            Route::get('/{id}', [LemburanController::class, 'show'])->name('lemburan.show');
            Route::get('/{id}/edit', [LemburanController::class, 'edit'])->name('lemburan.edit');
            Route::put('/{id}', [LemburanController::class, 'update'])->name('lemburan.update');
            Route::delete('/{id}', [LemburanController::class, 'destroy'])->name('lemburan.destroy');
            Route::put('/{id}/approve', [LemburanController::class, 'approve'])->name('lemburan.approve');
            Route::put('/{id}/reject', [LemburanController::class, 'reject'])->name('lemburan.reject');
        });

        // ✅ Data Produksi
        Route::prefix('produksi')->group(function () {
            Route::get('/', [ProduksiController::class, 'index'])->name('produksi.index');
            Route::get('/create', [ProduksiController::class, 'create'])->name('produksi.create');
            Route::post('/', [ProduksiController::class, 'store'])->name('produksi.store');
            Route::get('/{id}', [ProduksiController::class, 'show'])->name('produksi.show');
            Route::get('/{id}/edit', [ProduksiController::class, 'edit'])->name('produksi.edit');
            Route::put('/{id}', [ProduksiController::class, 'update'])->name('produksi.update');
            Route::delete('/{id}', [ProduksiController::class, 'destroy'])->name('produksi.destroy');
        });
        // ✅ Data Izin
            Route::get('/admin/izin', [IzinController::class, 'adminIndex'])->name('admin.izin');
            Route::get('/admin/izin/approve/{id}', [IzinController::class, 'approve'])->name('admin.izin.approve');
            Route::get('/admin/izin/reject/{id}', [IzinController::class, 'reject'])->name('admin.izin.reject');

    });

    // ============================================================
    // 🔸 ATASAN SECTION
    // ============================================================
        Route::middleware(['can:atasan'])->group(function () {
        Route::get('/atasan/dashboard', [AtasanController::class, 'index'])->name('atasan.dashboard');
        Route::get('/dashboard-atasan', [AbsensiController::class, 'dashboardAtasan'])->name('dashboard.atasan');
        Route::put('/atasan/lembur/{id}/setujui', [AtasanController::class, 'setujui'])->name('lembur.setujui');
        Route::put('/atasan/lembur/{id}/tolak', [AtasanController::class, 'tolak'])->name('lembur.tolak');
    

    
    });

    // ============================================================
    // 🔸 KARYAWAN SECTION
    // ============================================================
    // Group khusus karyawan
        Route::middleware(['auth', 'can:karyawan'])->group(function () {
        Route::get('/karyawan/dashboard', [KaryawanController::class, 'dashboard'])->name('karyawan.dashboard');
        Route::get('/karyawan/absensi', [KaryawanController::class, 'absensi']) ->name('karyawan.absensi');
        Route::get('/karyawan/lembur', [KaryawanController::class, 'lembur']) ->name('karyawan.lembur');
        Route::get('/karyawan/profil', [KaryawanController::class, 'profil']) ->name('karyawan.profil');
        
        //karyawan izin
        Route::get('/karyawan/izin', [IzinController::class, 'index'])->name('karyawan.izin');
        Route::get('/karyawan/izin/create', [IzinController::class, 'create'])->name('karyawan.izin.create');
        Route::post('/karyawan/izin', [IzinController::class, 'store'])->name('karyawan.izin.store');

        });

});
