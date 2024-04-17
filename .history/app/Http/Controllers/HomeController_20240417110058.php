<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function homePage() {
        return view('Frontend.home');
    }

    public function kontak() {
        return view('Frontend.kontak');
    }
}
