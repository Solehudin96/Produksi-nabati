<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
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
    public function index()
    {
        if (Gate::allows('admin')) {
            return view('home.admin.dashboard');
        } elseif (Gate::allows('atasan')) {
            return view('home.atasan.dashboard');
        } elseif (Gate::allows('karyawan')) {
            $hadir = Absensi::where('user_id', Auth::id())
                ->where('status', 'hadir')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count();

            return view('home.karyawan.dashboard', compact('hadir'));
        } else {
            Auth::logout();
            return redirect()->route('login');
        }
    }

    public function data_atasan()
    {
        $authUser = Auth::user();

        $atasan = User::where('role', 'atasan')->get();

        return view('data_atasan.index', compact('atasan'));
    }

    public function store_atasan(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'atasan',
        ]);

        return redirect()->back()->with('success', 'Data atasan berhasil ditambahkan!');
    }

    public function edit_atasan($id)
    {
        $atasan = User::findOrFail($id);
        return view('data_atasan.edit', compact('atasan'));
    }

    public function update_atasan(Request $request, $id)
    {
        $atasan = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $atasan->id,
        ]);

        $atasan->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        return redirect('data_atasan')->with('success', 'Data atasan berhasil diperbarui!');
    }

    /**
     * Hapus data atasan
     */
    public function delete_atasan($id)
    {
        $atasan = User::findOrFail($id);

        // Hanya hapus jika benar-benar role atasan
        if ($atasan->role !== 'atasan') {
            return redirect()->back()->with('error', 'Data ini bukan atasan.');
        }

        $atasan->delete();

        return redirect()->back()->with('success', 'Data atasan berhasil dihapus!');
    }

    /**
     * Tampilkan data karyawan
     */
    public function data_karyawan()
    {
        $authUser = Auth::user();

        $karyawan = User::where('role', 'karyawan')->get();

        return view('data_karyawan.index', compact('karyawan'));
    }

    /**
     * Simpan data karyawan baru
     */
    public function store_karyawan(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'karyawan',
        ]);

        return redirect()->back()->with('success', 'Data karyawan berhasil ditambahkan!');
    }

    /**
     * Halaman Edit Karyawan
     */
    public function edit_karyawan($id)
    {
        $karyawan = User::findOrFail($id);
        return view('data_karyawan.edit', compact('karyawan'));
    }

    /**
     * Update Data Karyawan
     */
    public function update_karyawan(Request $request, $id)
    {
        $karyawan = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $karyawan->id,
        ]);

        $karyawan->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        return redirect('data_karyawan')->with('success', 'Data karyawan berhasil diperbarui!');
    }

    /**
     * Hapus Data Karyawan
     */
    public function delete_karyawan($id)
    {
        $karyawan = User::findOrFail($id);

        if ($karyawan->role !== 'karyawan') {
            return redirect()->back()->with('error', 'Data ini bukan karyawan.');
        }

        $karyawan->delete();

        return redirect()->back()->with('success', 'Data karyawan berhasil dihapus!');
    }
}
