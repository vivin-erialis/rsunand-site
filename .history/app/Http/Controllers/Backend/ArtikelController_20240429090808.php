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
        return view('Backend.artikel.edit', [
            'artikel' => Artikel::find($id),
            'active' => 'admin/artikel',
            'kategori' => KategoriArtikel::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $slug = Str::limit(Str::slug($request->title), 50, '');

        if ($request->gambar != null) {
            $gambarlama = Artikel::where('id', $id)->first();
            File::delete('images/artikel/' . $gambarlama->gambar);
            $gambar = time() . '-' . $request->nama . '.jpg';
            $request->gambar->move(public_path('images/artikel'), $gambar);
            Artikel::find($id)->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'isi' => $request->isi,
                'gambar' => $gambar,
                'status' => '1',
                'url' => $slug,
                // 'profil_id' => Auth::user()->id,
                'kategori_id' => $request->kategori_id
            ]);
        } else {
            Artikel::find($id)->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'isi' => $request->isi,
                'status' => '1',
                'url' => $slug,
                // 'profil_id' => Auth::user()->id,
                'kategori_id' => $request->kategori_id
            ]);
        }

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
