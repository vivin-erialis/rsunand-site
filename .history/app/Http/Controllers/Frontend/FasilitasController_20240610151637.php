<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    //
    public function detailPendidikanPelatihan($id)
    {
        return view('Frontend.artikel.detail-pendidikan-pelatihan', [
            'headerStart' => Artikel::where('url', $id)->first()->title,
            'pendidikanPelatihan' => Artikel::where('url', $id)->first(),
            'kategori' => KategoriArtikel::all(),
        ]);
    }
}
