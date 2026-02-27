<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN FORM REGISTER
    |--------------------------------------------------------------------------
    */
    public function register()
    {
        return view('auth.register');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES REGISTER
    |--------------------------------------------------------------------------
    */
    public function registerPost(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:5'
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'siswa' // default role siswa
        ]);

        return redirect()->route('login')
            ->with('success', 'Register berhasil, silakan login.');
    }

    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN FORM LOGIN
    |--------------------------------------------------------------------------
    */
    public function login()
    {
        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */
    public function loginPost(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan');
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        // ==============================
        // SIMPAN SESSION (WAJIB ADA ROLE)
        // ==============================
        session([
            'login'     => true,
            'user_id'   => $user->id,
            'user_name' => $user->name,
            'role'      => $user->role
        ]);

        // ==============================
        // REDIRECT SESUAI ROLE
        // ==============================
        if ($user->role === 'admin') {
            return redirect()->route('admin.pengaduan.index');
        }

        return redirect()->route('siswa.pengaduan.index');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    public function logout()
    {
        session()->flush();

        return redirect()->route('login')
            ->with('success', 'Logout berhasil');
    }
}