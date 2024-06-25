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
        $layanan = DB::table('layanans')
            ->join('m_layanan', 'layanans.kategori_layanan', 'm_layanan.id')
            ->where('kategori_layanan', '=', '1')
            ->select('layanans.*')
            ->get();

        return view('Frontend.layanan.layanan-unggulan', [
            'headerStart' => 'Layanan Unggulan',
            'layanan' => $layanan
        ]);
    }

    public function layananKesehatan()
    {

        $layanan = DB::table('layanans')
            ->join('m_layanan', 'layanans.kategori_layanan', 'm_layanan.id')
            ->where('kategori_layanan', '=', '2')
            ->select('layanans.*')
            ->get();

        return view('Frontend.layanan.layanan-kesehatan', [
            'headerStart' => 'Layanan Kesehatan',
            'layanan' => $layanan
        ]);
    }

    public function layananLainnya()
    {
        $layanan = DB::table('layanans')
            ->join('m_layanan', 'layanans.kategori_layanan', 'm_layanan.id')
            ->where('kategori_layanan', '=', '3')
            ->select('layanans.*')
            ->get();


        return view('Frontend.layanan.layanan-lainnya', [
            'headerStart' => 'Layanan Lainnya',
            'layanan' => $layanan
        ]);
    }

    public function detailLayananUnggulan($id)
    {
        $layanan = DB::table('layanans')
            ->where('layanans.id', $id)
            ->first();

        // Melakukan query ke database
        $headerStart = DB::table('layanans')
            ->where('layanans.id', $id)
            ->select('layanans.nama_layanan')
            ->get();

        return view('Frontend.layanan.detail-layanan-unggulan', [
            'headerStart' => $headerStart,
            'layanan' => $layanan,
        ]);
    }
    public function detailLayananKesehatan($id)
    {
        $layanan = DB::table('layanans')
            ->where('layanans.id', $id)
            ->first();

        // Melakukan query ke database
        $headerStart = DB::table('layanans')
            ->where('layanans.id', $id)
            ->select('layanans.nama_layanan')
            ->get();

        return view('Frontend.layanan.detail-layanan-kesehatan', [
            'headerStart' => $headerStart,
            'layanan' => $layanan,
        ]);
    }
    public function detailLayananLainnya($id)
    {

        $layanan = DB::table('layanans')
            ->where('layanans.id', $id)
            ->first();

        // Melakukan query ke database
        $headerStart = DB::table('layanans')
            ->where('layanans.id', $id)
            ->select('layanans.nama_layanan')
            ->get();

        return view('Frontend.layanan.detail-layanan-lainnya', [
            'headerStart' => $headerStart,
            'layanan' => $layanan,
        ]);
    }
}
