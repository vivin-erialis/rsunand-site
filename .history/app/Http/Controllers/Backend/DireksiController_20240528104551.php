<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Direksi;
use Illuminate\Http\Request;

class DireksiController extends Controller
{
    //
    public function getDireksi() {
        $direksi = Direksi::all();
        return response()->json($direksi);
    }

    public function indexDireksi() {
        $direksi = Direksi::all();

        return view('Backend.direksi.index', [
            'direksi' => $direksi,
            'active' => 'admin/direksi'
        ]);
    }
}
