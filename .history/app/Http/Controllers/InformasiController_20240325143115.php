<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiController extends Controller
{
    //
    public function jadwalDokter() {
        return view('Frontend.informasi.jadwal-dokter')
    }
}
