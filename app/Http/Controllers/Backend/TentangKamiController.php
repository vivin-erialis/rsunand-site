<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TentangKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TentangKamiController extends Controller
{
    //
    public function indexProfile()
    {
        return view('Backend.profile.index', [
            'active' => 'admin/profile',
            'profile' => TentangKami::all(),

        ]);
    }

    public function getProfile()
    {
        $profile = TentangKami::all();

        return response()->json([
            'active' => 'admin/profile',
            'profile' => $profile,
        ]);
    }


    //Menyimpan data
    public function saveProfile(Request $request)
    {

        // Simpan data ke database menggunakan transaksi
        DB::beginTransaction();
        try {
            $data = new TentangKami();
            $data->perkembangan = $request->input('perkembangan');
            $data->sejarah = $request->input('sejarah');
            $data->struktur_organisasi = $request->input('struktur_organisasi');
            $data->email = $request->input('email');
            $data->telp = $request->input('telp');
            $data->alamat = $request->input('alamat');
            $data->save();

            // Komit transaksi jika berhasil
            DB::commit();

            // Kembalikan respon JSON dengan pesan sukses
            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully',
                'data' => $data,
            ], 201);
        } catch (\Exception $e) {
            // Batalkan transaksi jika terjadi error
            DB::rollBack();

            // Kembalikan respon JSON dengan pesan error
            return response()->json([
                'success' => false,
                'message' => 'Error saving data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    // Cari data edit
    public function getDataForEdit($id)
    {
        $profile = TentangKami::find($id);
        return response()->json($profile);
    }

    // Edit Data
    public function updateProfile(Request $request, $id)
    {
        // Temukan data berdasarkan ID
        $data = TentangKami::find($id);

        // Jika data tidak ditemukan, kembalikan respon JSON dengan pesan error
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }


        // Update data di database menggunakan transaksi
        DB::beginTransaction();
        try {
            // Update field
            $data->perkembangan = $request->input('perkembangan');
            $data->sejarah = $request->input('sejarah');
            $data->email = $request->input('email');
            $data->telp = $request->input('telp');
            $data->alamat = $request->input('alamat');

            // Handle file upload
            if ($request->hasFile('foto')) {
                // Hapus file lama jika ada
                if ($data->foto && file_exists(storage_path('../images/dokter' . $data->struktur_organisasi))) {
                    unlink(storage_path('../images/dokter' . $data->struktur_organisasi));
                }

                // Upload file baru
                $file = $request->file('foto');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');

                // Simpan path file baru ke database
                $data->foto = $filePath;
            }

            $data->save();

            // Komit transaksi jika berhasil
            DB::commit();

            // Kembalikan respon JSON dengan pesan sukses
            return response()->json([
                'success' => true,
                'message' => 'Data updated successfully',
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            // Batalkan transaksi jika terjadi error
            DB::rollBack();

            // Kembalikan respon JSON dengan pesan error
            return response()->json([
                'success' => false,
                'message' => 'Error updating data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function hapusProfile($id)
    {
        // Temukan data berdasarkan ID
        $data = TentangKami::find($id);

        // Jika data tidak ditemukan, kembalikan respon JSON dengan pesan error
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        // Hapus data dari database menggunakan transaksi
        DB::beginTransaction();
        try {
            $data->delete();

            // Komit transaksi jika berhasil
            DB::commit();

            // Kembalikan respon JSON dengan pesan sukses
            return response()->json([
                'success' => true,
                'message' => 'Data deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            // Batalkan transaksi jika terjadi error
            DB::rollBack();

            // Kembalikan respon JSON dengan pesan error
            return response()->json([
                'success' => false,
                'message' => 'Error deleting data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function indexSejarah()
    {
        return view('Backend.profile.sejarah.index', [
            'active' => 'admin/sejarah',
        ]);
    }

    public function updateSejarah(Request $request, $id)
    {
        // Temukan data berdasarkan ID
        $data = TentangKami::find($id);

        // Jika data tidak ditemukan, kembalikan respon JSON dengan pesan error
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        // Update data di database menggunakan transaksi
        DB::beginTransaction();
        try {

            $data->sejarah = $request->input('sejarah');

            $data->save();

            // Komit transaksi jika berhasil
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data updated successfully',
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error updating data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function indexPerkembangan() {
        return view('Backend.profile.perkembangan.index', [
            'active' => 'admin/perkembangan'
        ]);
    }

    public function updatePerkembangan(Request $request, $id)
    {
        // Temukan data berdasarkan ID
        $data = TentangKami::find($id);

        // Jika data tidak ditemukan, kembalikan respon JSON dengan pesan error
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        // Update data di database menggunakan transaksi
        DB::beginTransaction();
        try {

            $data->perkembangan = $request->input('perkembangan');

            $data->save();

            // Komit transaksi jika berhasil
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data updated successfully',
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error updating data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
