<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    //index layanan
    public function indexLayanan() {
        return view('Backend.layanan.index', [
            'active' => 'admin/layanan',
            'layanan' => Layanan::all(),
        ]);
    }

    public function getLayanan()
    {
        $layanan = Layanan::all();

        return response()->json([
            'active' => 'admin/layanan',
            'layanan' => $layanan,
        ]);
    }


}
