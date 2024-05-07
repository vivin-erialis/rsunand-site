<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\spesialis;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    //

    public function jadwalDokter() {
        return view('Frontend.informasi.jadwal-dokter', [
            'headerStart' => 'Jadwal Dokter'
        ]);
    }
    public function informasiDokter(Request $request) {
        // return view('Frontend.informasi.informasi-dokter', [
        //     'headerStart' => 'Informasi Dokter',
        //     'dokter' => Dokter::all(),
        //     'kategori' => spesialis::all()
        // ]);

        $kategori = $request->input('kategori'); // Ambil nilai kategori dari request

        // Jika kategori tidak ditentukan, tampilkan semua dokter
        if ($kategori === null) {
            $dokter = Dokter::all();
        } else {
            // Jika kategori ditentukan, tampilkan dokter berdasarkan kategori
            $dokter = Dokter::where('kategori', $kategori)->get();
        }

        return view('Frontend.informasi.informasi-dokter', [
            'dokter' => $dokter,
            'headerStart' => 'Informasi Dokter',
        ]);
    }

    public function bagianInstalasi() {
        return view('Frontend.informasi.bagian-instalasi', [
            'headerStart' => 'Bagian & Instalasi'
        ]);
    }
}
