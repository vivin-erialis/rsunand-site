<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
            'gambar.*' => 'required|image', // Gunakan 'gambar.*' untuk validasi setiap file yang diunggah
            'kategori_id' => 'required'
        ]);

        $slug = Str::limit(Str::slug($request->title), 50, '');

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $gambarPaths = [];

        // Loop melalui setiap file yang diunggah
        foreach ($request->file('gambar') as $gambar) {
            $namaGambar = time() . '-' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images/artikel'), $namaGambar);
            $gambarPaths[] = $namaGambar; // Simpan path gambar ke dalam array
        }

        $artikel = Artikel::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'isi' => $request->isi,
            'gambar' => json_encode($gambarPaths), // Simpan path gambar sebagai JSON
            'status' => '1',
            'url' => $slug,
            'kategori_id' => $request->kategori_id
        ]);

        return redirect('admin/artikel')->with('pesan', 'Data Artikel Berhasil Ditambah');
    }
}
