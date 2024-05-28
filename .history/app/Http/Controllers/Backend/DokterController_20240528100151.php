<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\spesialis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    //
    public function indexDokter()
    {
        return view('Backend.dokter.index', [
            'active' => 'admin/dokter',
            'dokter' => Dokter::all(),
            'spesialis' => spesialis::all()
        ]);
    }

    public function getDokter()
    {
        $dokter = DB::table('dokters')
            ->join('spesialis', 'dokters.spesialis_id', '=', 'spesialis.id')
            ->select('dokters.*', 'spesialis.title as title')
            ->get();
        return response()->json([
            'active' => 'admin/dokter',
            'dokter' => $dokter
        ]);
    }

    public function saveDokter(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'spesialis_id' => 'required'
        ]);

        // Jika validasi gagal, kembalikan pesan kesalahan sebagai respons JSON
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Proses file foto
        if ($request->hasFile('foto')) {
            $foto = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('images/dokter'), $foto);
        }

        // Buat data dokter
        $dokter = Dokter::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'foto' => $foto,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pendidikan' => $request->pendidikan,
            'spesialis_id' => $request->spesialis_id
        ]);

        // Kembalikan respons JSON
        return response()->json([
            'message' => 'Data Dokter Berhasil Ditambah',
            'dokter' => $dokter
        ], 201);
    }

    public function getDataForEdit($id)
    {
        $dokter = Dokter::find($id);
        return response()->json($dokter);
    }

    public function updateDokter(Request $request, $id)
    {
        // Validate the request data
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'nip' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg', // 'required' removed to make it optional
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'pendidikan' => 'required',
                'spesialis_id' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            // Find the doctor by ID
            $dokter = Dokter::find($id);
            if (!$dokter) {
                return response()->json(['error' => 'Data Dokter tidak ditemukan'], 404);
            }

            // Check if a new file is uploaded
            if ($request->hasFile('foto')) {
                // Delete the old photo if it exists
                if ($dokter->foto && file_exists(public_path('images/dokter/' . $dokter->foto))) {
                    unlink(public_path('images/dokter/' . $dokter->foto));
                }

                // Save the new photo
                $foto = time() . $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move(public_path('images/dokter'), $foto);
                $dokter->foto = $foto;
            }

            // Update the doctor data
            $dokter->nama = $request->nama;
            $dokter->nip = $request->nip;
            $dokter->tempat_lahir = $request->tempat_lahir;
            $dokter->tanggal_lahir = $request->tanggal_lahir;
            $dokter->pendidikan = $request->pendidikan;
            $dokter->spesialis_id = $request->spesialis_id;

            $dokter->save();

            return response()->json(['message' => 'Data Artikel Berhasil Diubah']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui data: ' . $e->getMessage()]);
        }
    }
}
