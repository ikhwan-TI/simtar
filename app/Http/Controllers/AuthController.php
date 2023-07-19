<?php

namespace App\Http\Controllers;

use App\Models\DataMahasiswa;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('main.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'NIM atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // Register
    public function register()
    {
        return view('main.register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'username' => 'unique:users,username',
            'email' => 'unique:users,email',
        ]);

        $userId = DB::table('users')->insertGetId(
            [
                'nama' => $request->nama,
                'username' => strtolower($request->username),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => 'mahasiswa',
            ]
        );

        DataMahasiswa::create([
            'user_id' => $userId
        ]);;

        return redirect('/login')->with('success', 'Akun berhasil dibuat. Silahkan login.');
    }
}
