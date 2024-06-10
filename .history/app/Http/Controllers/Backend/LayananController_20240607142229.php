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
                $gambar->move(public_path('images/layanan'), $namaGambar);
                $gambarPaths[] = $namaGambar;
            }

            $layanan = Layanan::create([
                'kategori_layanan' => $request->kategori_layanan,
                'nama_layanan' => $request->nama_layanan,
                'desc' => $request->desc,
                'isi' => $request->isi,
                'gambar' => json_encode($gambarPaths),
                'url' => $slug,
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
