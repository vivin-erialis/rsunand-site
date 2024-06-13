<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Spesialis;
use App\Models\DokterSpesialis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Traits\MasterTrait;

class DokterController extends Controller
{
    use MasterTrait;

    public function indexDokter()
    {
        return view('Backend.dokter.index', [
            'active' => 'admin/dokter',
            'dokter' => Dokter::all(),
        ]);
    }

    public function getDokter()
    {
        $dokter = DB::table('dokters')
            ->select('dokters.*')
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
            // 'nip' => 'required',
            // 'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'tempat_lahir' => 'required',
            // 'tanggal_lahir' => 'required',
            // 'pendidikan' => 'required',
        ]);

        // Jika validasi gagal, kembalikan pesan kesalahan sebagai respons JSON
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        DB::beginTransaction();

        try {
            // Initialize the photo variable
            $foto = null;

            // Check and process the uploaded photo file
            if ($request->hasFile('foto')) {
                $foto = time() . '_' . $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move(public_path('images/dokter'), $foto);
            }

            // Create the doctor data
            $id_dokter = $this->idCreate('dokters', 'id');
            $dokter = Dokter::create([
                'id'                => $id_dokter,
                'gelar_depan'       => $request->gelar_depan,
                'nama'              => $request->nama,
                'gelar_belakang'    => $request->gelar_belakang,
                'nip'               => $request->nip,
                'tempat_lahir'      => $request->tempat_lahir,
                'tanggal_lahir'     => $request->tanggal_lahir,
                'foto'              => $foto,
                'pendidikan'        => $request->pendidikan,
                'isdokter'          => $request->isdokter,
                'idhfis'            => $request->idhfis,
                'statusenabled'     => 1
            ]);

            // Commit the transaction
            DB::commit();

            // Return JSON response
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

    public function updateDokter(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            // 'nip' => 'required',
            // 'foto' => 'image|mimes:jpeg,png,jpg,gif,svg', // 'required' removed to make it optional
            // 'tempat_lahir' => 'required',
            // 'tanggal_lahir' => 'required',
            // 'pendidikan' => 'required',
            // 'spesialis_id' => 'required'
        ]);

        // Jika validasi gagal, kembalikan pesan kesalahan sebagai respons JSON
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $dokter = Dokter::find($id);

        if (!$dokter) {
            return response()->json(['error' => 'Data Dokter tidak ditemukan'], 404);
        }

        DB::beginTransaction();

        try {
            // Check if a new file is uploaded
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($dokter->foto && File::exists(public_path('images/dokter/' . $dokter->foto))) {
                    File::delete(public_path('images/dokter/' . $dokter->foto));
                }

                // Simpan foto baru
                $foto = time() . '_' . $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move(public_path('images/dokter'), $foto);
                $dokter->foto = $foto;
            }

            // Update data dokter
            $dokter->nama = $request->nama;
            $dokter->nip = $request->nip;
            $dokter->tempat_lahir = $request->tempat_lahir;
            $dokter->tanggal_lahir = $request->tanggal_lahir;
            $dokter->pendidikan = $request->pendidikan;

            $dokter->save();

            DB::commit();

            return response()->json(['message' => 'Data Dokter Berhasil Diubah']);
        } catch (\Exception $e) {
            DB::rollBack();

            // Hapus file yang sudah terupload jika terjadi error
            if (isset($foto) && File::exists(public_path('images/dokter/' . $foto))) {
                File::delete(public_path('images/dokter/' . $foto));
            }

            return response()->json(['message' => 'Gagal memperbarui data: ' . $e->getMessage()], 500);
        }
    }


    public function hapusDokter($id)
    {
        $dokter = Dokter::find($id);
        if (!$dokter) {
            return response()->json(['message' => 'Data Dokter tidak ditemukan.'], 404);
        }

        DB::beginTransaction();

        try {
            // Hapus foto terkait jika ada
            if ($dokter->foto && File::exists(public_path('images/dokter/' . $dokter->foto))) {
                File::delete(public_path('images/dokter/' . $dokter->foto));
            }

            // Hapus data dokter
            $dokter->delete();

            DB::commit();

            return response()->json(['message' => 'Data Dokter berhasil dihapus.']);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'Gagal menghapus data dokter: ' . $e->getMessage()], 500);
        }
    }


    public function indexDokterSpesialis()
    {
        return view('Backend.dokter.spesialis.index', [
            'active' => 'admin/dokter/spesialis',
            'dokter' => Dokter::all(),
            'spesialis' => Spesialis::all()
        ]);
    }

    public function saveDokterSpesialis(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'dokter' => 'required',
            'spesialis' => 'required'
        ]);

        // Jika validasi gagal, kembalikan pesan kesalahan sebagai respons JSON
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        DB::beginTransaction();

        try {

            // Buat data dokter
            $id_dokter_spesialis = $this->idCreate('m_dokter_spesialis', 'id_dokter_spesialis');
            $dokter = DokterSpesialis::create([
                'id_dokter_spesialis'   => $id_dokter_spesialis,
                'id_dokter'             => $request->dokter,
                'id_spesialis'          => $request->spesialis,
                'idhfis'                => $request->idhfis,
                'statusenabled'         => 1
            ]);

            DB::commit();

            // Kembalikan respons JSON
            return response()->json([
                'message' => 'Data Dokter Spesialis Berhasil Ditambah',
                'dokter' => $dokter
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'Gagal menambah data: ' . $e->getMessage()], 500);
        }
    }
}
