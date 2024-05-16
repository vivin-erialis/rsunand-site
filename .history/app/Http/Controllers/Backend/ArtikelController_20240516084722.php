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
    public function getDataArtikel() {
        return view('Backend.artikel.index', [
            'active' => 'admin/artikel',
            'artikel' => Artikel::all(),
            'kategori' => KategoriArtikel::all()
        ]);
    }

    //Menyimpan data
    public function store(Request $request)
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

            return response()->json(['message' => 'Data Artikel Berhasil Ditambah', 'artikel' => $artikel], 201);
        } catch (\Exception $e) {
            \Log::error($e); // Log the error
            return response()->json(['errors' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }
    }
}
