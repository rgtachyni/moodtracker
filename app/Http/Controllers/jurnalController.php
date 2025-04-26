<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
            'password' => 'required|string|min:6|confirmed',
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


}
