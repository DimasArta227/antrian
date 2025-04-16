<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin(){
        if (Auth::check()){
            return redirect('/dashboard');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request)
        {   
            $data = [ 
                'email' => $request->email,
                'password' => $request->password,
            ];

            if (Auth:: Attempt($data)) {
                return redirect('/dashboard')->with('success', 'Login Berhasil');
            } else {
                return redirect('/')->with('failed', 'Email atau Password salah !!!');
            }
        }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Anda Berhasil Logout');
    }

}

