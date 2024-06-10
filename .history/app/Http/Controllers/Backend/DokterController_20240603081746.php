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

        // Menambahkan URL foto ke setiap dokter
        foreach ($dokter as $d) {
            $d->foto_url = asset('images/dokter/' . $d->foto);
        }

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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'spesialis_id' => 'required'
        ]);

        // Jika validasi gagal, kembalikan pesan kesalahan sebagai respons JSON
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        DB::beginTransaction();

        try {
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

            DB::commit();

            // Kembalikan respons JSON
            return response()->json([
                'message' => 'Data Dokter Berhasil Ditambah',
                'dokter' => $dokter
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            // Hapus file yang sudah terupload jika terjadi error
            if (isset($foto) && File::exists(public_path('images/dokter/' . $foto))) {
                File::delete(public_path('images/dokter/' . $foto));
            }

            return response()->json(['message' => 'Gagal menambah data: ' . $e->getMessage()], 500);
        }
    }

    public function getDataForEdit($id)
    {
        $dokter = Dokter::find($id);
        return response()->json($dokter);
    }


    public function hapusDokter($id)
    {
        $dokter = Dokter::find($id);
        if (!$dokter) {
            return response()->json(['message' => 'Data Dokter tidak ditemukan.'], 404);
        }

        $dokter->delete();

        return response()->json(['message' => 'Data Dokter berhasil dihapus.']);
    }
}
