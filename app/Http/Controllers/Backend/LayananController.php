<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    //index layanan
    public function indexLayanan()
    {

        $kategoriLayanan = DB::table('m_layanan')->get();
        return view('Backend.layanan.index', [
            'active' => 'admin/layanan',
            'kategoriLayanan' => $kategoriLayanan
        ]);
    }

    public function getLayanan()
    {
        $layanan = DB::table('t_layanan_det')
            ->join('m_layanan_det', 't_layanan_det.id_layanan_det', 'm_layanan_det.id')
            ->join('m_layanan', 'm_layanan_det.id_layanan', 'm_layanan.id')
            ->select('t_layanan_det.*', 'm_layanan_det.nama_layanan', 'm_layanan_det.url', 'm_layanan.nama_kategori')
            ->get();

        return response()->json([
            'active' => 'admin/layanan',
            'layanan' => $layanan,
        ]);
    }

    // simpan data
    public function saveLayanan(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_layanan' => 'required',
        ]);

        $slug = Str::limit(Str::slug($request->nama_layanan), 50, '');

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $gambarPaths = [];

        DB::beginTransaction();

        try {
            // Proses dan simpan gambar
            if ($request->hasFile('gambar')) {
                foreach ($request->file('gambar') as $gambar) {
                    $namaGambar = time() . '-' . $gambar->getClientOriginalName();
                    $gambar->move(public_path('images/layanan'), $namaGambar);
                    $gambarPaths[] = $namaGambar;
                }
            }

            // Simpan data ke tabel m_layanan_det menggunakan query SQL
            DB::table('m_layanan_det')->insert([
                'id_layanan' => $request->id_layanan,
                'nama_layanan' => $request->nama_layanan,
                'url' => $slug,

            ]);

            // Dapatkan ID dari entri yang baru dibuat di tabel m_layanan_det
            $mLayananDetId = DB::getPdo()->lastInsertId();

            // Simpan data ke tabel t_layanan_det menggunakan query SQL
            DB::table('t_layanan_det')->insert([
                'id_layanan_det' => $mLayananDetId,
                'desc' => $request->desc,
                'gambar' => json_encode($gambarPaths),
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Data Layanan Berhasil Ditambah'
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e); // Log the error
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }
    }


    // Cari data edit
    public function getDataForEdit($id)
    {

        $layanan = DB::table('t_layanan_det')
            ->join('m_layanan_det', 't_layanan_det.id_layanan_det', '=', 'm_layanan_det.id')
            ->join('m_layanan', 'm_layanan_det.id_layanan', '=', 'm_layanan.id')
            ->select('t_layanan_det.*', 'm_layanan_det.nama_layanan', 'm_layanan_det.id_layanan', 'm_layanan_det.url', 'm_layanan.nama_kategori')
            ->where('t_layanan_det.id', $id)
            ->first();

        return response()->json($layanan);
    }


    // Edit Data
    public function updateLayanan(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_layanan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $slug = Str::limit(Str::slug($request->nama_layanan), 50, '');
        $gambarPaths = [];

        DB::beginTransaction();

        try {
            // Dapatkan data dari tabel t_layanan_det berdasarkan id
            $tLayananDet = DB::table('t_layanan_det')->where('id', $id)->first();

            if (!$tLayananDet) {
                return response()->json(['message' => 'Data tidak ditemukan'], 404);
            }

            // Proses dan simpan gambar jika ada
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama
                $oldGambarPaths = json_decode($tLayananDet->gambar, true);
                if ($oldGambarPaths) {
                    foreach ($oldGambarPaths as $oldGambar) {
                        $oldGambarPath = public_path('images/layanan') . '/' . $oldGambar;
                        if (file_exists($oldGambarPath)) {
                            unlink($oldGambarPath);
                        }
                    }
                }

                // Simpan gambar baru
                foreach ($request->file('gambar') as $gambar) {
                    $namaGambar = time() . '-' . $gambar->getClientOriginalName();
                    $gambar->move(public_path('images/layanan'), $namaGambar);
                    $gambarPaths[] = $namaGambar;
                }
            }

            // Update data di tabel m_layanan_det
            DB::table('m_layanan_det')->where('id', $tLayananDet->id_layanan_det)->update([
                'nama_layanan' => $request->nama_layanan,
                'url' => $slug
            ]);

            // Update data di tabel t_layanan_det
            $updateData = [
                'desc' => $request->desc,
            ];

            if (!empty($gambarPaths)) {
                $updateData['gambar'] = json_encode($gambarPaths);
            }

            DB::table('t_layanan_det')->where('id', $id)->update($updateData);

            DB::commit();

            return response()->json([
                'message' => 'Data Layanan Berhasil Diupdate'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e); // Log the error
            return response()->json(['message' => 'Terjadi kesalahan saat mengupdate data.'], 500);
        }
    }
    public function hapusLayanan($id)
    {
        DB::beginTransaction();

        try {
            // Dapatkan data dari tabel t_layanan_det berdasarkan id
            $tLayananDet = DB::table('t_layanan_det')->where('id', $id)->first();

            if (!$tLayananDet) {
                return response()->json(['message' => 'Data tidak ditemukan'], 404);
            }

            // Hapus gambar terkait jika ada
            $gambarPaths = json_decode($tLayananDet->gambar, true);
            if ($gambarPaths) {
                foreach ($gambarPaths as $gambar) {
                    $gambarPath = public_path('images/layanan') . '/' . $gambar;
                    if (file_exists($gambarPath)) {
                        unlink($gambarPath);
                    }
                }
            }

            // Hapus data dari tabel t_layanan_det
            DB::table('t_layanan_det')->where('id', $id)->delete();

            // Hapus data dari tabel m_layanan_det
            DB::table('m_layanan_det')->where('id', $tLayananDet->id_layanan_det)->delete();

            DB::commit();

            return response()->json([
                'message' => 'Data Layanan Berhasil Dihapus'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e); // Log the error
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data.'], 500);
        }
    }

}
