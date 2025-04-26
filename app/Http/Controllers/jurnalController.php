<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class jurnalController extends Controller
{
    public function register(){
        return view('register');
    }
    public function prosesRegister(Request $request)
    {
        // dd($request);
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Simpan data user ke database
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

       

        return redirect('/');
    }

    public function login(){
        return view('login');
    }
    public function proseslogin(Request $request)
{
    $credentials = $request->validate([
        'nama' => 'required|string',
        'pasword' => 'required|string',
    ]);

    // Custom credentials karena default-nya pakai email
    $user = \App\Models\User::where('nama', $credentials['nama'])->first();

    if ($user && Hash::check($credentials['pasword'], $user->password)) {
        Auth::login($user); // login manual pakai model
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
        'nama' => 'Nama atau password salah.',
    ])->onlyInput('nama');
}



}
