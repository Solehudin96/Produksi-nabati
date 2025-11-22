<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $karyawans = Karyawan::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('nik', 'like', "%{$search}%")
                         ->orWhere('jabatan', 'like', "%{$search}%")
                         ->orWhere('departemen', 'like', "%{$search}%");
        })->paginate(5);

        return view('karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
         $request->validate([
        'nama' => 'required',
        'nik' => 'required|unique:karyawans',
        'jabatan' => 'required',
        'departemen' => 'required',
        'jenis_kelamin' => 'required',
        'no_telp' => 'nullable',
        'alamat' => 'nullable',
        'tanggal_masuk' => 'nullable|date',
        'status' => 'required',
        ]);

        Karyawan::create($request->only(['nama', 'nik', 'jabatan', 'departemen', 'jenis_kelamin', 'no_telp', 'alamat', 'tanggal_masuk', 'status']));
        return redirect()->route('karyawan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:karyawans,nik,' . $karyawan->id,
            'jabatan' => 'required',
            'departemen' => 'required',
        ]);

        $karyawan->update($request->only(['nama', 'nik', 'jabatan', 'departemen']));
        return redirect()->route('karyawan.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Data berhasil dihapus');
    }

    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.show', compact('karyawan'));
    }
}
