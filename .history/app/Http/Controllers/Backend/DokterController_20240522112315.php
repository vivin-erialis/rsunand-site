<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    //
    public function indexDokter() {
        return view('Backend.dokter.index', [
            'active' => 'admin/dokter',
            'dokter' => Dokter::all()
        ]);
    }
}
