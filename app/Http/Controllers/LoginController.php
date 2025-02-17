<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login()
    {
    
            return view('login.login');
        
    }

    public function actionlogin(Request $request)
{
    $data = [
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ];

    if (Auth::Attempt($data)) {
        $request->session()->regenerate();

        if (Auth::user()->role === 'Admin') {
            return redirect()->route('dashboard.index'); // Redirect ke dashboard admin
        } elseif (Auth::user()->role === 'Kasir') {
            return redirect()->route('dashboard.index'); // Redirect ke dashboard kasir
        } else {
            return redirect('/'); // Redirect ke halaman default jika role tidak dikenali
        }
    } else {
        Session::flash('error', 'Email atau Password Salah');
        return redirect('/');
    }
}


    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}