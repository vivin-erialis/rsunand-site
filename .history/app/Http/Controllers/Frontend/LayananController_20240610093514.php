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
            'headerStart' => 'Ilmiah',
            'layanan' => $layanan
        ]);
    }

    public function layananRajal()
    {
        $layanan = DB::table('layanans')->where('kategori_layanan', '3')->get();
        return view('Frontend.layanan.layanan-rajal', [
            'headerStart' => 'Ilmiah',
            'layanan' => $layanan
        ]);
    }

    public function layananPenunjang()
    {
        $layanan = DB::table('layanans')->where('kategori_layanan', '2')->get();
        return view('Frontend.layanan.layanan-penunjang', [
            'headerStart' => 'Ilmiah',
            'layanan' => $layanan
        ]);
    }

    public function layananLainnya()
    {
        $layanan = DB::table('layanans')->where('kategori_layanan', '4')->get();
        return view('Frontend.layanan.layanan-lainnya', [
            'headerStart' => 'Ilmiah',
            'layanan' => $layanan
        ]);
    }
}
