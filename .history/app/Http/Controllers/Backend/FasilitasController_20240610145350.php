<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FasilitasController extends Controller
{
    //
    public function indexFasilitas()
    {
        return view('Backend.fasilitas.index', [
            'active' => 'admin/fasilitas',
            'fasilitas' => Fasilitas::all(),
        ]);
    }

    public function getFasilitas()
    {
        $fasilitas = Fasilitas::all();

        return response()->json([
            'active' => 'admin/fasilitas',
            'artikel' => $fasilitas,
        ]);
    }


    //Menyimpan data
    public function saveFasilitas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar.*' => 'required|image',
        ]);

        $slug = Str::limit(Str::slug($request->nama), 50, '');

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $gambarPaths = [];

        DB::beginTransaction();

        try {
            foreach ($request->file('gambar') as $gambar) {
                $namaGambar = time() . '-' . $gambar->getClientOriginalName();
                $gambar->move(public_path('images/fasilitas'), $namaGambar);
                $gambarPaths[] = $namaGambar;
            }

            $fasilitas = Fasilitas::create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'gambar' => json_encode($gambarPaths),
                'url' => $slug,
            ]);

            DB::commit();

            return response()->json(['message' => 'Data Fasilitas Berhasil Ditambah', 'fasilitas' => $fasilitas], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e); // Log the error
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }
    }

    // Cari data edit
    public function getDataForEdit($id)
    {
        $fasilitas = Fasilitas::find($id);
        return response()->json($fasilitas);
    }

    // Edit Data
    public function updateDataFasilitas(Request $request, $id)
    {
        try {
            $slug = Str::limit(Str::slug($request->title), 50, '');

            $fasilitas = Fasilitas::find($id);

            if (!$fasilitas) {
                return response()->json(['error' => 'Data Fasilitas tidak ditemukan'], 404);
            }

            $gambarlama = json_decode($fasilitas->gambar, true);

            // Hapus gambar-gambar lama
            foreach ($gambarlama as $gambar) {
                if (file_exists(public_path('images/fasilitas/' . $gambar))) {
                    unlink(public_path('images/fasilitas/' . $gambar));
                }
            }

            // Inisialisasi array baru untuk menyimpan nama gambar-gambar baru
            $gambarBaru = [];

            if ($request->hasFile('gambar')) {
                foreach ($request->file('gambar') as $gambar) {
                    $namaGambar = time() . '-' . $gambar->getClientOriginalName();
                    $gambar->move(public_path('images/fasilitas'), $namaGambar);
                    $gambarBaru[] = $namaGambar;
                }
            }

            // Update data artikel setelah mengunggah gambar
            Fasilitas::find($id)->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'gambar' => json_encode($gambarBaru),
                'url' => $slug,
            ]);

            return response()->json(['message' => 'Data Fasilitas Berhasil Diubah']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui data: ' . $e->getMessage()]);
        }
    }


    public function editStatus(Request $request, $id)
    {
        $article = Fasilitas::findOrFail($id);
        $article->status = $request->status;
        $article->save();

        return response()->json(['message' => 'Status artikel berhasil diperbarui']);
    }

    public function hapusDataArtikel($id)
    {
        $fasilitas = Fasilitas::find($id);
        if (!$fasilitas) {
            return response()->json(['message' => 'Artikel tidak ditemukan.'], 404);
        }

        // Decode JSON gambar paths
        $gambarPaths = json_decode($fasilitas->gambar, true);

        DB::beginTransaction();

        try {
            if (is_array($gambarPaths)) {
                // Hapus gambar terkait dari folder penyimpanan
                foreach ($gambarPaths as $gambarPath) {
                    $filePath = public_path('images/artikel/' . $gambarPath);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

            // Hapus artikel dari database
            $fasilitas->delete();

            DB::commit();

            return response()->json(['message' => 'Artikel berhasil dihapus.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Gagal menghapus Fasilitas: ' . $e->getMessage()], 500);
        }
    }
}
