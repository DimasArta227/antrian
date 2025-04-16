<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $emailUser = User::pluck('email')->toArray();
        if($request->email == $emailUser){
            return redirect('/')->with('error', 'Akun dengan email tersebut sudah terdaftar');
        }
        // Simpan user baru dengan role 'pelanggan'
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'pelanggan', // Default sebagai pelanggan
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect('/')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
