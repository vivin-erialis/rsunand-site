<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    //
    public function fasilitas($id)
    {
        return view('Frontend.fasilitas', [
            'headerStart' => Fasilitas::where('url', $id)->first()->title,
            'fasilitas' => Fasilitas::where('url', $id)->first(),
        ]);
    }
}
