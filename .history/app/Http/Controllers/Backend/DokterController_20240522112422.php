<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    //
    public function indexDokter()
    {
        return view('Backend.dokter.index', [
            'active' => 'admin/dokter',
            'dokter' => Dokter::all()
        ]);
    }

    public function getDokter()
    {

        $dokter = Dokter::all();

        return response()->json([
            'active' => 'admin/dokter',
            'dokter' => $dokter
        ]);
    }
}
