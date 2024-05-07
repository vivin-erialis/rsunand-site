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
        return view('Frontend.informasi.bagian-instalasi', [
            'headerStart' => 'Bagian & Instalasi'
        ]);
    }
}
