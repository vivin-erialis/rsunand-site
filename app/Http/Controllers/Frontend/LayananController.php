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

        $layanan = DB::table('t_layanan_det')
        ->join('m_layanan_det', 't_layanan_det.id_layanan_det', 'm_layanan_det.id')
        ->join('m_layanan', 'm_layanan_det.id_layanan', 'm_layanan.id')
        ->where('m_layanan_det.id_layanan', '=', '1')
        ->select('t_layanan_det.thumbnail', 't_layanan_det.desc', 'm_layanan_det.*', 'm_layanan.nama_kategori')
        ->get();


        return view('Frontend.layanan.layanan-unggulan', [
            'headerStart' => 'Layanan Unggulan',
            'layanan' => $layanan
        ]);
    }

    public function layananKesehatan()
    {

        $layanan = DB::table('t_layanan_det')
            ->join('m_layanan_det', 't_layanan_det.id_layanan_det', 'm_layanan_det.id')
            ->join('m_layanan', 'm_layanan_det.id_layanan', 'm_layanan.id')
            ->where('m_layanan_det.id_layanan', '=', '2')
            ->select('t_layanan_det.thumbnail', 't_layanan_det.desc', 'm_layanan_det.*', 'm_layanan.nama_kategori')
            ->get();


        return view('Frontend.layanan.layanan-kesehatan', [
            'headerStart' => 'Layanan Kesehatan',
            'layanan' => $layanan
        ]);
    }

    public function layananLainnya()
    {

        $layanan = DB::table('t_layanan_det')
            ->join('m_layanan_det', 't_layanan_det.id_layanan_det', 'm_layanan_det.id')
            ->join('m_layanan', 'm_layanan_det.id_layanan', 'm_layanan.id')
            ->where('m_layanan_det.id_layanan', '=', '3')
            ->select('t_layanan_det.thumbnail', 't_layanan_det.desc', 'm_layanan_det.*', 'm_layanan.nama_kategori')
            ->get();


        return view('Frontend.layanan.layanan-lainnya', [
            'headerStart' => 'Layanan Lainnya',
            'layanan' => $layanan
        ]);
    }

    public function detailLayananUnggulan($id)
    {
        $layanan = DB::table('t_layanan_det')
            ->join('m_layanan_det', 't_layanan_det.id_layanan_det', 'm_layanan_det.id')
            ->join('m_layanan', 'm_layanan_det.id_layanan', 'm_layanan.id')
            ->where('m_layanan_det.url', $id)
            ->select('t_layanan_det.*', 'm_layanan_det.*', 'm_layanan.nama_kategori', 'm_layanan.url as url_m_layanan')
            ->first();

        // return $layanan;

        // Melakukan query ke database
        $headerStart = DB::table('t_layanan_det')
            ->join('m_layanan_det', 't_layanan_det.id_layanan_det', 'm_layanan_det.id')
            ->where('m_layanan_det.url', $id)
            ->select('m_layanan_det.nama_layanan')
            ->get();

        return view('Frontend.layanan.detail-layanan-unggulan', [
            'headerStart' => $headerStart,
            'layanan' => $layanan,
        ]);
    }
    public function detailLayananKesehatan($id)
    {
        $layanan = DB::table('t_layanan_det')
            ->join('m_layanan_det', 't_layanan_det.id_layanan_det', 'm_layanan_det.id')
            ->join('m_layanan', 'm_layanan_det.id_layanan', 'm_layanan.id')
            ->where('m_layanan_det.url', $id)
            ->select('t_layanan_det.*', 'm_layanan_det.*', 'm_layanan.*')
            ->first();

        // return $layanan;

        // Melakukan query ke database
        $headerStart = DB::table('t_layanan_det')
            ->join('m_layanan_det', 't_layanan_det.id_layanan_det', 'm_layanan_det.id')
            ->where('m_layanan_det.url', $id)
            ->select('m_layanan_det.nama_layanan')
            ->get();

        return view('Frontend.layanan.detail-layanan-kesehatan', [
            'headerStart' => $headerStart,
            'layanan' => $layanan,
        ]);
    }
    public function detailLayananLainnya($id)
    {

        $layanan = DB::table('t_layanan_det')
            ->join('m_layanan_det', 't_layanan_det.id_layanan_det', 'm_layanan_det.id')
            ->join('m_layanan', 'm_layanan_det.id_layanan', 'm_layanan.id')
            ->where('m_layanan_det.url', $id)
            ->select('t_layanan_det.*', 'm_layanan_det.*', 'm_layanan.*')
            ->first();

        // return $layanan;

        // Melakukan query ke database
        $headerStart = DB::table('t_layanan_det')
            ->join('m_layanan_det', 't_layanan_det.id_layanan_det', 'm_layanan_det.id')
            ->where('m_layanan_det.url', $id)
            ->select('m_layanan_det.nama_layanan')
            ->get();

        return view('Frontend.layanan.detail-layanan-lainnya', [
            'headerStart' => $headerStart,
            'layanan' => $layanan,
        ]);
    }
}
