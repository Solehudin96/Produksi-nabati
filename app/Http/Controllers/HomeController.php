<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        switch ($user->role) {
            case 'admin':
                return view('admin.dashboard');
            
            case 'atasan':
                return view('atasan.dashboard');
            
            case 'karyawan':
                return view('karyawan.dashboard');
            
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors('Role pengguna tidak dikenali.');
        }
    }
}
