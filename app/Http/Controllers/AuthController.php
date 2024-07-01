<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'confirmed', 'min:8'],
                'nama' => ['required', 'string'],
                'no_hp' => ['required', 'string', 'unique:users,no_hp'],
                'image_path' => ['nullable', 'string'],
            ],
            [
                'email.required' => 'Email Harus Diisi.',
                'email.email' => 'Masukkan Email Yang Valid.',
                'email.unique' => 'Email Sudah Terdaftar.',
                'password.required' => 'Password Harus Diisi.',
                'password.confirmed' => 'Konfirmasi Password Tidak Valid.',
                'nama.required' => 'Nama Harus Diisi.',
                'no_hp.required' => 'No HP Harus Diisi.',
            ]
        );

        DB::beginTransaction();

        try {

            User::create($request->all());

            DB::commit();

            return redirect()->route('auth.login');

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function login(Request $request)
    {
        return view("auth.login");
    }

    public function loginStore(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ], [
            'email.email' => 'Masukkan Email Yang Valid.',
            'email.exists' => 'Email Belum Terdaftar.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->role == 'admin') {
                return redirect()->route('dashboard')->with('message', 'Selamat Datang di Dashboard Admin');
            }

            $url = $request->url;

            if ($url == '') {
                return redirect()->route('home');
            } else {
                return redirect($url);
            }

        }

        return back()->withErrors([
            'password' => 'Password Salah!',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
