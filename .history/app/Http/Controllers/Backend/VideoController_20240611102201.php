<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    public function indexVideo()
    {
        return view('Backend.video.index', [
            'active' => 'admin/video',
            'video' => Video::all(),

        ]);
    }

    public function getArtikel()
    {
        $artikel = Artikel::all();
        $kategori = KategoriArtikel::all();

        return response()->json([
            'active' => 'admin/artikel',
            'artikel' => $artikel,
            'kategori' => $kategori
        ]);
    }
}
