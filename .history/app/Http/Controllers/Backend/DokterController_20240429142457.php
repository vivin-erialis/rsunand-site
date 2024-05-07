<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\spesialis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Backend.dokter.index', [
            'active' => 'admin/dokter',
            'dokter' => Dokter::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Backend.dokter.create', [
            'spesialis' => spesialis::all(),
            'active' => 'admin/dokter',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'spesialis_id' => 'required'
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
            'gambar' => $gambar,
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
