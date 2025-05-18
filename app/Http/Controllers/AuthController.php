<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
     // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }
    // Proses login
    public function login(Request $request)
{
    // Validasi input login
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    // Cek apakah email sudah terdaftar
    $user = User::where('email', $credentials['email'])->first();

    if (!$user) {
        // Jika email tidak terdaftar, arahkan ke halaman register
        return redirect()->route('register')->with('warning', 'Email belum terdaftar. Silakan daftar terlebih dahulu.');
    }


    // Coba login pakai email & password
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Ambil user yang sedang login
        $user = Auth::user();

        // Cek apakah role_id user adalah 1 atau 2
        if (in_array($user->role_id, [1, 2])) {
            return redirect()->intended('/dashboard');
        }

        // Kalau role_id bukan 1 atau 2, logout lagi
        Auth::logout();
        return back()->withErrors([
            'email' => 'Akses ditolak. Akun Anda tidak memiliki izin masuk.',
        ]);
    }

    // Jika gagal login (email/password salah)
    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}


    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}