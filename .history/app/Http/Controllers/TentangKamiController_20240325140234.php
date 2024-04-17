<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    //
    public function tentangKami() {
        return view('Frontend.tentang-kami.sejarah', [
            'headerStart' => 'Kontak'
        ]);
    }
}
