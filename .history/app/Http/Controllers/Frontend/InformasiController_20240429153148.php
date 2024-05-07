<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
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
        return view('Frontend.informasi.informasi-dokter', [
            'headerStart' => 'Informasi Dokter',
            'dokter' => Dokter::all()
        ]);
    }

    public function bagianInstalasi() {
        return view('Frontend.informasi.bagian-instalasi', [
            'headerStart' => 'Bagian & Instalasi'
        ]);
    }
}
