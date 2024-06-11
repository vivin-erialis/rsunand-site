<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Direksi;
use App\Models\Dokter;
use App\Models\KategoriArtikel;
use App\Models\spesialis;
use App\Models\TentangKami;
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
        $spesialis = $request->input('spesialis'); // Ambil nilai spesialis dari request

        // Jika spesialis tidak ditentukan, tampilkan semua dokter
        if ($spesialis === null) {
            $dokter = Dokter::all();
        } else {
            // Jika spesialis ditentukan, tampilkan dokter berdasarkan spesialis
            $dokter = Dokter::where('spesialis_id', $spesialis)->get();
        }
        return view('Frontend.informasi.informasi-dokter', [
            'dokter' => $dokter,
            'spesialis' => spesialis::all(),
            'headerStart' => 'Informasi Dokter',
        ]);
    }

    public function bagianInstalasi() {
        // $bagianInstalsi = Artikel::where('title', 'Bagian & Instalasi')->get();
        $bagianInstalsi = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Bagian & Instalasi');
        })->get();

        return view('Frontend.informasi.bagian-instalasi', [
                'bagianInstalasi' => $bagianInstalsi,
                'headerStart' => 'Bagian & Instalasi'

        ]);
    }


    public function detailBagianInstalasi($id)
    {
        return view('Frontend.informasi.detail-bagian-instalasi', [
            'headerStart' => Artikel::where('url', $id)->first()->title,
            'bagianInstalasi' => Artikel::where('url', $id)->first(),
            'kategori' => KategoriArtikel::all(),
        ]);
    }


    public function sejarah() {
        $sejarah = TentangKami::all();
        return view('Frontend.tentang-kami.sejarah', [
            'headerStart' => 'Sejarah',
            'sejarah' => $sejarah

        ]);
    }
    public function direksi() {
        $direksi = Direksi::all();
        return view('Frontend.tentang-kami.direksi', [
            'headerStart' => 'Direksi',
            'direksi' => $direksi

        ]);
    }
    public function visiMisi() {
        return view('Frontend.tentang-kami.visi-misi', [
            'headerStart' => 'Visi & Misi',
        ]);
    }

}
