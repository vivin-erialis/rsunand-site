<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiController extends Controller
{
    //
    public function jadwalDokter() {
        return view('Frontend.informasi.jadwal-dokter', [
            'headerStart' => 'Jadwal Dokter'
        ]);
    }
    public function informasiDokter() {
        return view('Frontend.informasi.Informasi-dokter', [
            'headerStart' => 'Informasi Dokter'
        ]);
    }
}
