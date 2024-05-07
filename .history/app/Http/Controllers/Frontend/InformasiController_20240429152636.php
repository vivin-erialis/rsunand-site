<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    //

    public function informasiDokter() {[
        return view('Frontend.informasi.informasi-dokter', [
            'dokter' => Dokter::all()
        ])
    ]}
}
