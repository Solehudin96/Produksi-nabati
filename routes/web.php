<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LemburanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', fn() => redirect()->route('login'));
Auth::routes(['register' => false, 'reset' => false]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/data_atasan', [HomeController::class, 'data_atasan'])->name('data_atasan');
Route::post('/data_atasan/store', [HomeController::class, 'store_atasan'])->name('atasan.store');
Route::get('/data_atasan/edit/{id}', [HomeController::class, 'edit_atasan'])->name('atasan.edit');
Route::put('/data_atasan/update/{id}', [HomeController::class, 'update_atasan'])->name('atasan.update');
Route::delete('/data_atasan/delete/{id}', [HomeController::class, 'delete_atasan'])->name('atasan.destroy');

Route::get('/data_karyawan', [HomeController::class, 'data_karyawan'])->name('data_karyawan');
Route::post('/data_karyawan/store', [HomeController::class, 'store_karyawan'])->name('karyawan.store');
Route::get('/data_karyawan/edit/{id}', [HomeController::class, 'edit_karyawan'])->name('karyawan.edit');
Route::put('/data_karyawan/update/{id}', [HomeController::class, 'update_karyawan'])->name('karyawan.update');
Route::delete('/data_karyawan/delete/{id}', [HomeController::class, 'delete_karyawan'])->name('karyawan.destroy');

Route::get('/data_absensi', [AbsensiController::class, 'data_absensi'])->name('data_absensi');
Route::post('data_absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('data_absensi/edit/{id}', [AbsensiController::class, 'edit'])->name('absensi.edit');
Route::put('data_absensi/update/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
Route::delete('data_absensi/delete/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');

Route::get('/data_lemburan', [LemburanController::class, 'data_lemburan'])->name('data_lemburan');
