<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //
    public function getArtikel($slug) {
        $artikel = Artikel::where('url', $slug)->first();

		// return view('frontend.artikel', [
		// 	'artikel' => $artikel
		// ]);

        return response()->json($artikel);
    }
}
