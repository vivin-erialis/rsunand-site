<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Fasilitas;
use App\Models\KerjaSama;
use App\Models\Layanan;
use App\Models\Slider;
use App\Models\TentangKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function homePage()
    {
        $artikel = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Berita');
        })->latest()->take(3)->get();

        $bagianInstalasi = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Bagian & Instalasi');
        })->take(6)->get();

        $recentPosts = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Berita');
        })->latest()->take(5)->get();

        $pendidikanPenelitian = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Pendidikan & Penelitian');
        })->latest()->take(5)->get();

        $fasilitas = Fasilitas::all();

        $layanan = DB::table('t_layanan_det')
            ->join('m_layanan_det', 't_layanan_det.id_layanan_det', 'm_layanan_det.id')
            ->join('m_layanan', 'm_layanan_det.id_layanan', 'm_layanan.id')
            ->where('m_layanan_det.id_layanan', '=', '1')
            ->select('t_layanan_det.*', 'm_layanan_det.*', 'm_layanan.*')
            ->get();


        $sliderImg = Slider::where('status', '=', '0')->get();

        $about = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Deksripsi RS');
        })->get();

        $kerjaSama = KerjaSama::all();

        return view('Frontend.home', [
            'headerStart' => 'Berita',
            'artikel' => $artikel,
            'layanan' => $layanan,
            'slider' => $sliderImg,
            'recentPosts' => $recentPosts,
            'bagianInstalasi' => $bagianInstalasi,
            'pendidikanPenelitian' => $pendidikanPenelitian,
            'fasilitas' => $fasilitas,
            'about' => $about,
            'kerjaSama' => $kerjaSama
        ]);
    }

    // public function getHomePage()
    // {
    //     $artikelBerita = Artikel::whereHas('kategori', function ($query) {
    //         $query->where('title', 'Berita');
    //     })->latest()->take(3)->get();

    //     $bagianInstalasi = Artikel::whereHas('kategori', function ($query) {
    //         $query->where('title', 'Bagian & Instalasi');
    //     })->latest()->take(3)->get();

    //     return response()->json([
    //         'headerStart' => 'Berita',
    //         'artikel' => $artikelBerita,
    //         'bagianInstalasi' => $bagianInstalasi
    //     ]);
    // }

    public function indexHomePage()
    {
        $artikelBerita = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Berita');
        })->latest()->take(3)->get();

        $bagianInstalasi = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Bagian & Instalasi');
        })->latest()->take(3)->get();

        return view('Frontend.home', [
            'artikelBerita' => $artikelBerita,
            'bagianInstalasi' => $bagianInstalasi
        ]);
    }
    public function kontak()
    {
        return view('Frontend.kontak', [
            'headerStart' => 'Kontak'
        ]);
    }
    public function informasi()
    {
        return view('Frontend.informasi', [
            'headerStart' => 'Informasi'
        ]);
    }

    public function karir()
    {
        return view('Frontend.karir', [
            'headerStart' => 'Karir'
        ]);
    }

    public function rektor()
    {

        $data = DB::table('m_jabatan_det')
            ->join('dokters', 'm_jabatan_det.id_dokter', '=', 'dokters.id')
            ->join('m_jabatan', 'm_jabatan_det.id_jabatan', '=', 'm_jabatan.id_jabatan')
            ->join('m_bidang', 'm_jabatan_det.id_bidang', '=', 'm_bidang.id_bidang')
            ->where('m_jabatan.aliase_jabatan', '=', 'Rektor')
            ->select('dokters.*', 'm_jabatan.*', 'm_jabatan_det.*', 'm_bidang.*')
            ->get();


        // return $data;

        return view('Frontend.manajemen.rektor', [
            'data' => $data,
            'headerStart' => 'Rektor Universitas Andalas',
        ]);
    }
    public function dewanPengawas()
    {

        $data = DB::table('m_jabatan_det')
            ->join('dokters', 'm_jabatan_det.id_dokter', '=', 'dokters.id')
            ->join('m_jabatan', 'm_jabatan_det.id_jabatan', '=', 'm_jabatan.id_jabatan')
            ->join('m_bidang', 'm_jabatan_det.id_bidang', '=', 'm_bidang.id_bidang')
            ->where('m_jabatan.aliase_jabatan', '=', 'Dewas')
            ->select('dokters.*', 'm_jabatan.*', 'm_jabatan_det.*', 'm_bidang.*')
            ->get();


        // return $data;

        return view('Frontend.manajemen.dewan-pengawas', [
            'data' => $data,
            'headerStart' => 'Dewan Pengawas RS Universitas Andalas',
        ]);
    }
    public function direksi()
    {

        $data = DB::table('m_jabatan_det')
            ->join('dokters', 'm_jabatan_det.id_dokter', '=', 'dokters.id')
            ->join('m_jabatan', 'm_jabatan_det.id_jabatan', '=', 'm_jabatan.id_jabatan')
            ->join('m_bidang', 'm_jabatan_det.id_bidang', '=', 'm_bidang.id_bidang')
            ->where('m_jabatan.aliase_jabatan', '=', 'Direksi')
            ->select('dokters.*', 'm_jabatan.*', 'm_jabatan_det.*', 'm_bidang.*')
            ->get();


        // return $data;

        return view('Frontend.manajemen.direksi', [
            'data' => $data,
            'headerStart' => 'Direksi RS Universitas Andalas',
        ]);
    }

    public function struktur()
    {
        $data = TentangKami::all();
        return view('Frontend.tentang-kami.struktur-organisasi', [
            'data' => $data,
            'headerStart' => 'Struktur Organisasi'
        ]);
    }
}
