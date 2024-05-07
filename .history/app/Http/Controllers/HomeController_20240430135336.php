<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function homePage() {
        $artikelBerita = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Berita');
        })->get();
        return view('Frontend.home', [
            'headerStart' => 'Berita',
            'artikel' => $artikelBerita
        ]);
    }

    public function kontak() {
        return view('Frontend.kontak', [
            'headerStart' => 'Kontak'
        ]);
    }
    public function informasi() {
        return view('Frontend.informasi', [
            'headerStart' => 'Informasi'
        ]);
    }

    public function karir() {
        return view('Frontend.karir', [
            'headerStart' => 'Karir'
        ]);
    }
}
