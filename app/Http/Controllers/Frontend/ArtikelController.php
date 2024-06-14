<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    //
    //
    public function berita()
    {
        // Mengambil artikel dengan kategori "berita"
        $artikelBerita = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Berita');
        })->get();

        return view('Frontend.artikel.berita', [
            'headerStart' => 'Berita',
            'artikel' => $artikelBerita
        ]);
    }

    public function detailBerita($id)
    {
        return view('Frontend.artikel.detail-berita', [
            'headerStart' => Artikel::where('url', $id)->first()->title,
            'berita' => Artikel::where('url', $id)->first(),
            'kategori' => KategoriArtikel::all(),
        ]);
    }


    public function ilmiah()
    {
        $ilmiah = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Ilmiah');
        })->get();

        return view('Frontend.artikel.ilmiah', [
            'headerStart' => 'Ilmiah',
            'ilmiah' => $ilmiah,
        ]);
    }

    public function detailIlmiah($id)
    {
        return view('Frontend.artikel.detail-ilmiah', [
            'headerStart' => Artikel::where('url', $id)->first()->title,
            'ilmiah' => Artikel::where('url', $id)->first(),
            'kategori' => KategoriArtikel::all(),
        ]);
    }

    public function pendidikanPelatihan()
    {
        $pendidikanPelatihan = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Pendidikan & Penelitian');
        })->get();
        return view('Frontend.artikel.pendidikan-pelatihan', [
            'headerStart' => 'Pendidikan & Penelitian',
            'artikel' => $pendidikanPelatihan
        ]);
    }
    public function detailPendidikanPelatihan($id)
    {
        return view('Frontend.artikel.detail-pendidikan-pelatihan', [
            'headerStart' => Artikel::where('url', $id)->first()->title,
            'pendidikanPelatihan' => Artikel::where('url', $id)->first(),
            'kategori' => KategoriArtikel::all(),
        ]);
    }

    public function penyakitPengobatan()
    {
        $penyakitPengobatan = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Penyakit & Pengobatan');
        })->get();
        return view('Frontend.artikel.penyakit-pengobatan', [
            'headerStart' => 'Penyakit & Pengobatan',
            'artikel' => $penyakitPengobatan
        ]);
    }


    // public function detailPenyakitPengobatan($id)
    // {
    //     return view('Frontend.artikel.detail-penyakit-pengobatan', [
    //         'headerStart' => Artikel::where('url', $id)->first()->title,
    //         'penyakitPengobatan' => Artikel::where('url', $id)->first(),
    //         'kategori' => KategoriArtikel::all(),
    //     ]);
    // }

    public function detailPenyakitPengobatan($id)
    {
        $penyakitPengobatan = Artikel::where('url', $id)->first();
        $penyakitPengobatan->isi = $this->convertOEmbedToIframe($penyakitPengobatan->isi);

        return view('Frontend.artikel.detail-penyakit-pengobatan', [
            'headerStart' => Artikel::where('url', $id)->first()->title,
            'kategori' => KategoriArtikel::all(),
            'penyakitPengobatan' => $penyakitPengobatan
        ]);
    }

    private function convertOEmbedToIframe($content)
    {
        $pattern = '/<oembed url="([^"]+)"><\/oembed>/i';

        $content = preg_replace_callback($pattern, function ($matches) {
            $url = $matches[1];
            // Parse the video ID from the URL
            parse_str(parse_url($url, PHP_URL_QUERY), $query);
            $videoId = $query['v'] ?? basename(parse_url($url, PHP_URL_PATH));
            // Clean up the video ID if it contains additional parameters
            if (strpos($videoId, '?') !== false) {
                $videoId = substr($videoId, 0, strpos($videoId, '?'));
            }
            if (strpos($videoId, '&') !== false) {
                $videoId = substr($videoId, 0, strpos($videoId, '&'));
            }
            // Create the embed URL
            $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
            // Return the iframe HTML
            return '<iframe width="560" height="315" src="' . $embedUrl . '" frameborder="0" allowfullscreen></iframe>';
        }, $content);

        return $content;
    }


}
