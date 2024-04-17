<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //
    public function berita() {
        return view('Frontend.artikel.berita', [
            'headerStart' => 'Berita'
        ]);
    }

    public function ilmiah() {
        return view('Frontend.artikel.ilmiah', [
            'headerStart' => 'Ilmiah'
        ]);
    }
    public function pendidikanPelatihan() {
        return view('Frontend.artikel.pendidikan-pelatihan', [
            'headerStart' => 'Pendidikan dan Pelatihan'
        ]);
    }
}
