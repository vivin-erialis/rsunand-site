<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    //
    //
    public function berita($nama)
    {
        // Mengambil artikel dengan kategori "berita"
        $artikelBerita = Artikel::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'berita');
        })->get();

        return view('Frontend.artikel.berita', [
            'headerStart' => 'Berita',
            'artikel' => $artikelBerita
        ]);
    }

    public function ilmiah()
    {
        return view('Frontend.artikel.ilmiah', [
            'headerStart' => 'Ilmiah'
        ]);
    }
    public function pendidikanPelatihan()
    {
        return view('Frontend.artikel.pendidikan-pelatihan', [
            'headerStart' => 'Pendidikan & Pelatihan'
        ]);
    }

    public function penyakitPengobatan()
    {
        return view('Frontend.artikel.penyakit-pengobatan', [
            'headerStart' => 'Penyakit & Pengobatan'
        ]);
    }
}
