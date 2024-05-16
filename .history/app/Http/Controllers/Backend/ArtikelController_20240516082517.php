<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //Menampilkan data
    public function getDataArtikel() {
        return view('Backend.artikel.index', [
            'active' => 'admin/artikel',
            'artikel' => Artikel::all(),
            'kategori' => KategoriArtikel::all()

        ]);
    }
}
