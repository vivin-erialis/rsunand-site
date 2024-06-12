<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\KerjaSama;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KerjasamaController extends Controller
{
    //
    public function indexKerjasama()
    {
        return view('Backend.kerjasama.index', [
            'active' => 'admin/kerjasama',
            'kerjasama' => KerjaSama::all(),
        ]);
    }

    public function getKerjasama()
    {
        $kerjasama = KerjaSama::all();
        foreach ($kerjasama as $d) {
            $d->foto_url = asset('images/kerjasama/' . $d->gambar);
        }

        return response()->json([
            'active' => 'admin/kerjasama',
            'kerjasama' => $kerjasama,
        ]);
    }

    public function saveKerjasama(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kerjasama' => 'required',
            'gambar' => 'required|image',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $gambar = null;

        DB::beginTransaction();

        try {
            // Ensure directory exists
            if (!file_exists(public_path('images/kerjasama'))) {
                mkdir(public_path('images/kerjasama'), 0755, true);
            }

            if ($request->hasFile('gambar')) {
                $gambar = time() . '_' . $request->file('gambar')->getClientOriginalName();
                $request->file('gambar')->move(public_path('images/kerjasama'), $gambar);
            }

            // Simpan data ke database
            $kerjasama = new KerjaSama();
            $kerjasama->nama_kerjasama = $request->input('nama_kerjasama');
            $kerjasama->gambar = $gambar;
            $kerjasama->save();

            DB::commit();

            return response()->json(['message' => 'Data Berhasil Ditambah', 'kerjasama' => $kerjasama], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            // Hapus gambar jika sudah diunggah tetapi terjadi kesalahan saat menyimpan data ke database
            if ($gambar && file_exists(public_path('images/kerjasama/' . $gambar))) {
                unlink(public_path('images/kerjasama/' . $gambar));
            }

            // Tambahkan log kesalahan detail
            \Log::error('Kesalahan saat menyimpan data kerjasama: ' . $e->getMessage());
            \Log::error('Trace: ' . $e->getTraceAsString());

            // Untuk debugging, uncomment baris berikut untuk menampilkan kesalahan
            dd($e);

            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }
    }


    //Menyimpan data
    public function updateKerjasama(Request $request, $id_kerjasama)
    {
        $validator = Validator::make($request->all(), [
            'nama_kerjasama' => 'required',
            'gambar' => 'image', // Ganti required dengan opsi yang sesuai dengan kebutuhan Anda
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();

        try {
            // Temukan data kerjasama yang akan diupdate
            $kerjasama = KerjaSama::find($id_kerjasama);

            // Periksa apakah data kerjasama ditemukan
            if (!$kerjasama) {
                return response()->json(['error' => 'Data tidak ditemukan'], 404);
            }

            // Simpan gambar baru jika diunggah
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($kerjasama->gambar && file_exists(public_path('images/kerjasama/' . $kerjasama->gambar))) {
                    unlink(public_path('images/kerjasama/' . $kerjasama->gambar));
                }

                // Simpan gambar baru
                $gambar = time() . '_' . $request->file('gambar')->getClientOriginalName();
                $request->file('gambar')->move(public_path('images/kerjasama'), $gambar);

                // Update nama gambar di database
                $kerjasama->gambar = $gambar;
            }

            // Update nama kerjasama
            $kerjasama->nama_kerjasama = $request->input('nama_kerjasama');
            $kerjasama->save();

            DB::commit();

            return response()->json(['message' => 'Data Berhasil Diubah', 'kerjasama' => $kerjasama]);
        } catch (\Exception $e) {
            DB::rollBack();

            // Untuk debugging, uncomment baris berikut untuk menampilkan kesalahan
            // dd($e);

            return response()->json(['message' => 'Terjadi kesalahan saat mengupdate data.'], 500);
        }
    }



    // Cari data edit
    public function getDataForEdit($id_kerjasama)
    {
        $kerjasama = DB::table('kerjasama')->where('id_kerjasama', $id_kerjasama)->first();
        return response()->json($kerjasama);
    }

    // Edit Data


    public function hapusKerjasama($id)
    {
        $kerjasama = KerjaSama::find($id);
        if (!$kerjasama) {
            return response()->json(['message' => 'kerjasama tidak ditemukan.'], 404);
        }

        // Decode JSON gambar paths
        $gambarPaths = json_decode($kerjasama->gambar, true);

        DB::beginTransaction();

        try {
            if (is_array($gambarPaths)) {
                // Hapus gambar terkait dari folder penyimpanan
                foreach ($gambarPaths as $gambarPath) {
                    $filePath = public_path('images/kerjasama/' . $gambarPath);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

            // Hapus fasilitas dari database
            $kerjasama->delete();

            DB::commit();

            return response()->json(['message' => 'Data berhasil dihapus.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Gagal menghapus Data: ' . $e->getMessage()], 500);
        }
    }
}
