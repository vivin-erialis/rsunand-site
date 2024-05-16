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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Backend.artikel.index', [
            'active' => 'admin/artikel',
            'artikel' => Artikel::all(),
            'kategori' => KategoriArtikel::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Backend.artikel.create', [
            'active' => 'admin/artikel',
            'kategori' => KategoriArtikel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
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


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Artikel::findOrFail($id);
        return view('Backend.artikel.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // ...
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

    return redirect('admin/artikel')->with('pesan', 'Data Kegiatan Berhasil Diubah');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $artikel = Artikel::where('id', $id)->first();
        File::delete('images/artikel/' . $artikel->gambar);
        Artikel::destroy($id);
        return redirect('admin/artikel')->with('pesan', 'Data Artikel Berhasil Dihapus');
    }
}
