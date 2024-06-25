<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    //


    public function subLayanan($id)
    {
        $layanan = DB::table('layanans')->where('kategori_layanan', $id)->get();
        $headerStart = DB::table('layanans')
        ->join('m_layanan', 'layanans.kategori_layanan', 'm_layanan.id')
        ->where('kategori_layanan', $id)
        ->select('m_layanan.nama_kategori')
        ->get();
        return view('Frontend.layanan.layanan-unggulan', [
            'headerStart' => $headerStart ,
            'layanan' => $layanan
        ]);
    }

    public function layananRajal()
    {
        $layanan = DB::table('layanans')->where('kategori_layanan', '3')->get();
        return view('Frontend.layanan.layanan-rajal', [
            'headerStart' => 'Layanan Rawat Jalan',
            'layanan' => $layanan
        ]);
    }

    public function layananPenunjang()
    {
        $layanan = DB::table('layanans')->where('kategori_layanan', '2')->get();
        return view('Frontend.layanan.layanan-penunjang', [
            'headerStart' => 'Layanan Penunjang',
            'layanan' => $layanan
        ]);
    }

    public function layananLainnya()
    {
        $layanan = DB::table('layanans')->where('kategori_layanan', '4')->get();
        return view('Frontend.layanan.layanan-lainnya', [
            'headerStart' => 'Layanan Lainnya',
            'layanan' => $layanan
        ]);
    }

    public function detailLayananUnggulan($id)
    {
        return view('Frontend.layanan.detail-layanan-unggulan', [
            'headerStart' => Layanan::where('url', $id)->first()->nama_layanan,
            'layanan' => Layanan::where('url', $id)->first(),
        ]);
    }
    public function detailLayananPenunjang($id)
    {
        return view('Frontend.layanan.detail-layanan-penunjang', [
            'headerStart' => Layanan::where('url', $id)->first()->nama_layanan,
            'layanan' => Layanan::where('url', $id)->first(),
        ]);
    }
    public function detailLayananRajal($id)
    {
        return view('Frontend.layanan.detail-layanan-rajal', [
            'headerStart' => Layanan::where('url', $id)->first()->nama_layanan,
            'layanan' => Layanan::where('url', $id)->first(),
        ]);
    }
    public function detailLayananLainnya($id)
    {
        return view('Frontend.layanan.detail-layanan-lainnya', [
            'headerStart' => Layanan::where('url', $id)->first()->nama_layanan,
            'layanan' => Layanan::where('url', $id)->first(),
        ]);
    }
}
