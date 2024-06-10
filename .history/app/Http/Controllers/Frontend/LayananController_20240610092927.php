<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    //

    public function layananUnggulan()
    {
        $layanan = DB::table('layanans')->where('kategori_layanan', '1')->get();
        return view('Frontend.layanan.layanan-unggulan', [
            'layanan' => $layanan
        ]);
    }
}
