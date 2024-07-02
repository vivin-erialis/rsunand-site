<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use App\Models\M_perkembangan;

class PasienPengunjungController extends Controller
{
    public function petunjukLokasi() {
        return view('Frontend.pasien-pengunjung.petunjuk-lokasi', [
            'headerStart' => 'Petunjuk Lokasi'
        ]);
    }

    public function fasilitas() {
        return view('Frontend.pasien-pengunjung.fasilitas', [
            'headerStart' => 'Fasilitas Rumah Sakit Unand'
        ]);
    }

    public function rawatInap() {
        $perkembangan = M_perkembangan::orderBy('created_at', 'desc')
        ->where('statusenabled', '=', 1)
        ->get();

        return view('Frontend.pasien-pengunjung.rawat-inap', [
            'headerStart' => 'Rawat Inap Rumah Sakit Unand',
            'perkembangan' => $perkembangan
        ]);
    }

    public function jamBezuk() {
        return view('Frontend.pasien-pengunjung.jam-bezuk', [
            'headerStart' => 'Informasi Jam Bezuk Rumah Sakit Unand'
        ]);
    }

    public function faq() {
        $perkembangan = M_perkembangan::orderBy('created_at', 'desc')
        ->where('statusenabled', '=', 1)
        ->get();

        return view('Frontend.pasien-pengunjung.faq', [
            'headerStart' => 'FAQ',
            'perkembangan' => $perkembangan
        ]);
    }
}
