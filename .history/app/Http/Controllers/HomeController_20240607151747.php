<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function homePage()
    {
        $artikel = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Berita');
        })->latest()->take(3)->get();

        $bagianInstalasi = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Bagian & Instalasi');
        })->latest()->take(3)->get();

        $layananUnggulan = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Bagian & Instalasi');
        })->latest()->take(3)->get();

        $sliderImg = Slider::where('status' , '=', '0')->get();

        return view('Frontend.home', [
            'headerStart' => 'Berita',
            'artikel' => $artikel,
            'slider' => $sliderImg,

            'bagianInstalasi' => $bagianInstalasi
        ]);
    }
    // public function getHomePage()
    // {
    //     $artikelBerita = Artikel::whereHas('kategori', function ($query) {
    //         $query->where('title', 'Berita');
    //     })->latest()->take(3)->get();

    //     $bagianInstalasi = Artikel::whereHas('kategori', function ($query) {
    //         $query->where('title', 'Bagian & Instalasi');
    //     })->latest()->take(3)->get();

    //     return response()->json([
    //         'headerStart' => 'Berita',
    //         'artikel' => $artikelBerita,
    //         'bagianInstalasi' => $bagianInstalasi
    //     ]);
    // }

    public function indexHomePage() {
        $artikelBerita = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Berita');
        })->latest()->take(3)->get();

        $bagianInstalasi = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Bagian & Instalasi');
        })->latest()->take(3)->get();

        return view('Frontend.home', [
            'artikelBerita' => $artikelBerita,
            'bagianInstalasi' => $bagianInstalasi
        ]);
    }
    public function kontak()
    {
        return view('Frontend.kontak', [
            'headerStart' => 'Kontak'
        ]);
    }
    public function informasi()
    {
        return view('Frontend.informasi', [
            'headerStart' => 'Informasi'
        ]);
    }

    public function karir()
    {
        return view('Frontend.karir', [
            'headerStart' => 'Karir'
        ]);
    }
}
