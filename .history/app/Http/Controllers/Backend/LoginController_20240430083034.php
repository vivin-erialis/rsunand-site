<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index() {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)){
            return redirect('/admin/dashboard');
        }

        return back()->with('errorlogin', 'Email atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
