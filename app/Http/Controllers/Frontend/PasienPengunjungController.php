<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

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
        return view('Frontend.pasien-pengunjung.rawat-inap', [
            'headerStart' => 'Rawat Inap Rumah Sakit Unand'
        ]);
    }
}
