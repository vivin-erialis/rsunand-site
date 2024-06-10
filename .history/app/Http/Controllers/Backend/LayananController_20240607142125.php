<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    //index layanan
    public function indexLayanan() {
        return view('Backend.layanan.index', [
            'active' => 'admin/layanan',
            'layanan' => Layanan::all(),
        ]);
    }

    public function getLayanan()
    {
        $layanan = Layanan::all();

        return response()->json([
            'active' => 'admin/layanan',
            'layanan' => $layanan,
        ]);
    }

    // simpan data
    public function saveDataArtikel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_layanan' => 'required',
            'nama_layanan' => 'required',
            'desc' => 'required',
            'isi' => 'required',
            'gambar.*' => 'required|image',
        ]);

        $slug = Str::limit(Str::slug($request->nama_layanan), 50, '');

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



}
