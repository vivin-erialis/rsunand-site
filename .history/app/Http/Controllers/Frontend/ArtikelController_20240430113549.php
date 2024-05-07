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
    public function berita()
    {
        // Mengambil artikel dengan kategori "berita"
        $artikelBerita = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Berita');
        })->get();

        return view('Frontend.artikel.berita', [
            'headerStart' => 'Berita',
            'artikel' => $artikelBerita
        ]);
    }

    public function detailBlog($id)
    {
        return view('Frontend.artikel.detail-berita', [
            'berita' => Artikel::where('slug', $id)->first(),
            'kategori' => KategoriArtikel::all(),
        ]);
    }


    public function ilmiah()
    {
        $ilmiah = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Ilmiah');
        })->get();

        return view('Frontend.artikel.ilmiah', [
            'headerStart' => 'Ilmiah',
            'ilmiah' => $ilmiah,
        ]);
    }
    public function pendidikanPelatihan()
    {
        $pendidikanPelatihan = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Ilmiah');
        })->get();
        return view('Frontend.artikel.pendidikan-pelatihan', [
            'headerStart' => 'Pendidikan & Pelatihan',
            'artikel' => $pendidikanPelatihan
        ]);
    }

    public function penyakitPengobatan()
    {
        $penyakitPengobatan = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Ilmiah');
        })->get();
        return view('Frontend.artikel.penyakit-pengobatan', [
            'headerStart' => 'Penyakit & Pengobatan',
            'artikel' => $penyakitPengobatan
        ]);
    }
}
