<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Direksi;
use App\Models\Dokter;
use App\Models\KategoriArtikel;
use App\Models\spesialis;
use App\Models\TentangKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
    //

    public function jadwalDokter()
    {
        return view('Frontend.informasi.jadwal-dokter', [
            'headerStart' => 'Jadwal Dokter'
        ]);
    }
    public function informasiDokter(Request $request)
    {
        $spesialis = $request->input('spesialis'); // Ambil nilai spesialis dari request

        // Jika spesialis tidak ditentukan, tampilkan semua dokter
        if ($spesialis === null) {
            $dokter = Dokter::all();
        } else {
            // Jika spesialis ditentukan, tampilkan dokter berdasarkan spesialis
            $dokter = Dokter::where('spesialis_id', $spesialis)->get();
        }
        return view('Frontend.informasi.informasi-dokter', [
            'dokter' => $dokter,
            'spesialis' => spesialis::all(),
            'headerStart' => 'Informasi Dokter',
        ]);
    }

    public function bagianInstalasi()
    {
        // $bagianInstalsi = Artikel::where('title', 'Bagian & Instalasi')->get();
        $bagianInstalsi = Artikel::whereHas('kategori', function ($query) {
            $query->where('title', 'Bagian & Instalasi');
        })->get();

        return view('Frontend.informasi.bagian-instalasi', [
            'bagianInstalasi' => $bagianInstalsi,
            'headerStart' => 'Bagian & Instalasi'

        ]);
    }


    public function detailBagianInstalasi($id)
    {
        return view('Frontend.informasi.detail-bagian-instalasi', [
            'headerStart' => Artikel::where('url', $id)->first()->title,
            'bagianInstalasi' => Artikel::where('url', $id)->first(),
            'kategori' => KategoriArtikel::all(),
        ]);
    }


    public function sejarah()
    {
        $sejarah = TentangKami::all();
        return view('Frontend.tentang-kami.sejarah', [
            'headerStart' => 'Sejarah',
            'sejarah' => $sejarah

        ]);
    }
    public function direksi()
    {
        $direksi = Direksi::all();
        return view('Frontend.tentang-kami.direksi', [
            'headerStart' => 'Direksi',
            'direksi' => $direksi

        ]);
    }
    public function visiMisi()
    {
        return view('Frontend.tentang-kami.visi-misi', [
            'headerStart' => 'Visi & Misi',
        ]);
    }
    public function medikKeperawatan()
    {
        $data = DB::table('dokters as dokter')
            ->join('m_jabatan_det', 'dokter.id', '=', 'm_jabatan_det.id_dokter')
            ->join('m_jabatan', 'm_jabatan_det.id_jabatan', '=', 'm_jabatan.id_jabatan')
            ->join('m_bidang', 'm_jabatan_det.id_bidang', '=', 'm_bidang.id_bidang')
            ->where('m_bidang.id_bidang', '=', '1')
            ->select('dokter.*', 'm_jabatan.*', 'm_jabatan_det.*', 'm_bidang.*')
            ->get();

        // return $data;

        return view('Frontend.tentang-kami.medik-keperawatan', [
            'data' => $data,
            'headerStart' => 'Bidang Pelayanan Medik dan Keperawatan',
        ]);
    }
    public function umumSumberDaya()
    {
        $data = DB::table('dokters as dokter')
            ->join('m_jabatan_det', 'dokter.id', '=', 'm_jabatan_det.id_dokter')
            ->join('m_jabatan', 'm_jabatan_det.id_jabatan', '=', 'm_jabatan.id_jabatan')
            ->join('m_bidang', 'm_jabatan_det.id_bidang', '=', 'm_bidang.id_bidang')
            ->where('m_bidang.id_bidang', '=', '2')
            ->select('dokter.*')
            ->get();

        // return $data;

        return view('Frontend.tentang-kami.umum-sumber-daya', [
            'data' => $data,
            'headerStart' => 'Bidang Umum dan Sumber Daya',
        ]);
    }
    public function keuanganPerencanaan()
    {
        $data = DB::table('dokters as dokter')
            ->join('m_jabatan_det', 'dokter.id', '=', 'm_jabatan_det.id_dokter')
            ->join('m_jabatan', 'm_jabatan_det.id_jabatan', '=', 'm_jabatan.id_jabatan')
            ->join('m_bidang', 'm_jabatan_det.id_bidang', '=', 'm_bidang.id_bidang')
            ->where('m_bidang.id_bidang', '=', '3')
            ->select('dokter.*')
            ->get();

        // return $data;

        return view('Frontend.tentang-kami.keuangan-perencanaan', [
            'data' => $data,
            'headerStart' => 'Bidang Keuangan dan Perencanaan',
        ]);
    }
}
