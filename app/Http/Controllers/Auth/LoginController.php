<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirect user setelah login sesuai role.
     */
    protected function redirectTo()
    {
        $role = Auth::user()->role;

        switch ($role) {
            case 'admin':
                return '/admin/dashboard';
            case 'atasan':
                return '/atasan/dashboard';
            case 'karyawan':
                return '/karyawan/dashboard';
            default:
                return '/home';
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
