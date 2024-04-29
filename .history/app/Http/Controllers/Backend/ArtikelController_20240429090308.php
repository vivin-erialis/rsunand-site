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
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
            'isi' => 'required',
            'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori_id' => 'required'
        ]);

        $slug = Str::limit(Str::slug($request->title), 50, '');

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $gambar = $request->file('gambar');
        $request->file('gambar')->move(public_path('images/artikel'), $gambar);

        $artikel = Artikel::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'isi' => $request->isi,
            'gambar' => $gambar->hashName(),
            'status' => '1',
            'url' => $slug,
            // 'profil_id' => Auth::user()->id,
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->gambar != null) {
            $gambar = Kegiatan::where('id', $id)->first();
            // dd($fotolama->foto);
            File::delete('images/kegiatan/' . $fotolama->foto);
            $foto = time() . '-' . $request->nama . '.jpg';
            $request->foto->move(public_path('images/kegiatan'), $foto);
            Kegiatan::find($id)->update([
                'id_kategori' => $request->id_kategori,
                'judul_kegiatan' => $request->judul_kegiatan,
                'slug' => Str::slug($request->judul_kegiatan),
                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                'foto' => $foto,
                'deskripsi' => $request->deskripsi,
                'quote' => $request->quote
            ]);
        } else {
            Kegiatan::find($id)->update([
                'id_kategori' => $request->id_kategori,
                'judul_kegiatan' => $request->judul_kegiatan,
                'slug' => Str::slug($request->judul_kegiatan),
                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                'deskripsi' => $request->deskripsi,
                'quote' => $request->quote
            ]);
        }

        return redirect('/admin/kegiatan')->with('success', 'Data Kegiatan Berhasil Diubah');
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
