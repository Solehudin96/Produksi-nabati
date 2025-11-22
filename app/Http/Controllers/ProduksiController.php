<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    /**
     * Menampilkan daftar data produksi dengan fitur pencarian.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $produksis = Produksi::when($search, function ($query, $search) {
            $query->where('nama_produk', 'like', "%{$search}%")
                  ->orWhere('customer', 'like', "%{$search}%");
        })->orderBy('tanggal_produksi', 'desc')
          ->paginate(10);

        return view('produksi.index', compact('produksis', 'search'));
    }

    /**
     * Menampilkan form tambah data produksi.
     */
    public function create()
    {
        return view('produksi.create');
    }

    /**
     * Menyimpan data produksi baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_produksi' => 'required|date',
            'nama_produk' => 'required|string|max:255',
            'customer' => 'required|string|max:255',
            'target_planning' => 'required|integer|min:0',
            'hasil_produksi_actual' => 'required|integer|min:0',
        ]);

        Produksi::create($validated);

        return redirect()->route('produksi.index')
                         ->with('success', 'Data produksi berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit data produksi.
     */
    public function edit($id)
    {
        $produksi = Produksi::findOrFail($id);
        return view('produksi.edit', compact('produksi'));
    }

    /**
     * Memperbarui data produksi.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal_produksi' => 'required|date',
            'nama_produk' => 'required|string|max:255',
            'customer' => 'required|string|max:255',
            'target_planning' => 'required|integer|min:0',
            'hasil_produksi_actual' => 'required|integer|min:0',
        ]);

        $produksi = Produksi::findOrFail($id);
        $produksi->update($validated);

        return redirect()->route('produksi.index')
                         ->with('success', 'Data produksi berhasil diperbarui.');
    }

    /**
     * Menghapus data produksi.
     */
    public function destroy($id)
    {
        $produksi = Produksi::findOrFail($id);
        $produksi->delete();

        return redirect()->route('produksi.index')
                         ->with('success', 'Data produksi berhasil dihapus.');
    }
}
