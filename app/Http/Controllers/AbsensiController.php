<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;

class AbsensiController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function data_absensi()
    {
        $absensi = Absensi::with('user')->get();
        $users = User::all();
        return view('data_absensi.index', compact('absensi', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required',
            'waktu_keluar' => 'required',
            'status' => 'required|string|max:50',
        ]);
        Absensi::create($request->all());
        return redirect()->route('data_absensi')->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $users = User::all();
        return view('data_absensi.edit', compact('absensi', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required',
            'waktu_keluar' => 'required',
            'status' => 'required|string|max:50',
        ]);
        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());
        return redirect()->route('data_absensi')->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();
        return redirect()->route('data_absensi')->with('success', 'Data absensi berhasil dihapus.');
    }
}
