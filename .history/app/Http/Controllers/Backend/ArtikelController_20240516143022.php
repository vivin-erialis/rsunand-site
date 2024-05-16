<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ArtikelController extends Controller
{
    //Menampilkan data
    public function getDataArtikel()
    {
        return view('Backend.artikel.index', [
            'active' => 'admin/artikel',
            'artikel' => Artikel::all(),
            'kategori' => KategoriArtikel::all()
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
                'status' => '1',
                'url' => $slug,
                'kategori_id' => $request->kategori_id
            ]);

            return response()->json(['pesan' => 'Data Artikel Berhasil Ditambah', 'artikel' => $artikel], 201);
        } catch (\Exception $e) {
            \Log::error($e); // Log the error
            return response()->json(['errors' => 'Terjadi kesalahan saat menyimpan data.'], 500);
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
            $kategori = KategoriArtikel::all();

            $gambarlama = Artikel::where('id', $id)->first();

            if ($request->hasFile('gambar')) {
                foreach ($request->file('gambar') as $gambar) {
                    $namaGambar = time() . '-' . $gambar->getClientOriginalName();
                    $gambar->move(public_path('images/artikel'), $namaGambar);
                    // Simpan nama gambar ke database atau lakukan operasi lainnya
                }
            }

            // Update data artikel setelah mengunggah gambar
            Artikel::find($id)->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'isi' => $request->isi,
                'status' => '1',
                'url' => $slug,
                'kategori_id' => $request->kategori_id
            ]);

            return response()->json(['success' => true, 'message' => 'Data Artikel Berhasil Diubah']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal memperbarui data: ' . $e->getMessage()]);
        }
    }

    public function hapusDataArtikel($id)
{
    $artikel = Artikel::find($id);
    if (!$artikel) {
        return response()->json(['message' => 'Artikel tidak ditemukan.'], 404);
    }

    $artikel->delete();

    // Simpan pesan dalam sesi
    session()->flash('toast_message', 'Artikel berhasil dihapus.');

    return response()->json(['message' => 'Artikel berhasil dihapus.']);
}
}
