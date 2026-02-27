<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email atau password salah');
        }

        // SIMPAN SESSION
        session([
            'login' => true,
            'user_id' => $user->id,
            'role' => $user->role
        ]);

        // ARAHKAN SESUAI ROLE
        if ($user->role == 'admin') {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/siswa/dashboard');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}