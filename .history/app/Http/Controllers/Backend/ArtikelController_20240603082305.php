<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ArtikelController extends Controller
{
    //Menampilkan data
    public function indexArtikel()
    {
        return view('Backend.artikel.index', [
            'active' => 'admin/artikel',
            'artikel' => Artikel::all(),
            'kategori' => KategoriArtikel::all()

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


    //Menyimpan data
    public function saveDataArtikel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
            'isi' => 'required',
            'gambar.*' => 'required|image',
            'kategori_id' => 'required'
        ]);

        $slug = Str::limit(Str::slug($request->title), 50, '');

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $gambarPaths = [];

        DB::beginTransaction();

        try {
            foreach ($request->file('gambar') as $gambar) {
                $namaGambar = time() . '-' . $gambar->getClientOriginalName();
                $gambar->move(public_path('images/artikel'), $namaGambar);
                $gambarPaths[] = $namaGambar;
            }

            $artikel = Artikel::create([
                'title' => $request->title,
                'desc' => $request->desc,
                'isi' => $request->isi,
                'gambar' => json_encode($gambarPaths),
                'status' => '0',
                'url' => $slug,
                'kategori_id' => $request->kategori_id
            ]);

            DB::commit();

            return response()->json(['message' => 'Data Artikel Berhasil Ditambah', 'artikel' => $artikel], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e); // Log the error
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }
    }

    // Cari data edit
    public function getDataForEdit($id)
    {
        $artikel = Artikel::find($id);
        return response()->json($artikel);
    }

    // Edit Data
    public function updateDataArtikel(Request $request, $id)
    {
        try {
            $slug = Str::limit(Str::slug($request->title), 50, '');

            $artikel = Artikel::find($id);

            if (!$artikel) {
                return response()->json(['error' => 'Data Artikel tidak ditemukan'], 404);
            }

            $gambarlama = json_decode($artikel->gambar, true);

            if ($request->hasFile('gambar')) {
                foreach ($request->file('gambar') as $gambar) {
                    $namaGambar = time() . '-' . $gambar->getClientOriginalName();
                    $gambar->move(public_path('images/artikel'), $namaGambar);
                    $gambarlama[] = $namaGambar;
                }
            }

            // Update data artikel setelah mengunggah gambar
            Artikel::find($id)->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'isi' => $request->isi,
                'status' => '0',
                'url' => $slug,
                'kategori_id' => $request->kategori_id,
                'gambar' => json_encode($gambarlama)
            ]);

            return response()->json(['message' => 'Data Artikel Berhasil Diubah']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui data: ' . $e->getMessage()]);
        }
    }

    public function editStatus(Request $request, $id)
    {
        $article = Artikel::findOrFail($id);
        $article->status = $request->status;
        $article->save();

        return response()->json(['message' => 'Status artikel berhasil diperbarui']);
    }

    public function hapusDataArtikel($id)
    {
        $artikel = Artikel::find($id);
        if (!$artikel) {
            return response()->json(['message' => 'Artikel tidak ditemukan.'], 404);
        }

        // Decode JSON gambar paths
        $gambarPaths = json_decode($artikel->gambar, true);

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
            $artikel->delete();

            DB::commit();

            return response()->json(['message' => 'Artikel berhasil dihapus.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Gagal menghapus artikel: ' . $e->getMessage()], 500);
        }
    }
}
