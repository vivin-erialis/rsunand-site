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
    $validator = Validator::make($request->all(), [
        'sejarah' => 'required',
        'email' => 'required|email',
        'telp' => 'required',
    ]);

    // Jika validasi gagal, kembalikan respon JSON dengan pesan error
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => $validator->errors(),
        ], 422);
    }

    // Simpan data ke database menggunakan transaksi
    DB::beginTransaction();
    try {
        $data = new TentangKami();
        $data->sejarah = $request->input('sejarah');
        $data->email = $request->input('email');
        $data->telp = $request->input('telp');
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
        $validator = Validator::make($request->all(), [
            'sejarah' => 'required',
            'email' => 'required|email',
            'telp' => 'required',
        ]);

        // Jika validasi gagal, kembalikan respon JSON dengan pesan error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Temukan data berdasarkan ID
        $data = TentangKami::find($id);

        // Jika data tidak ditemukan, kembalikan respon JSON dengan pesan error
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        // Update data di database
        try {
            $data->sejarah = $request->input('sejarah');
            $data->email = $request->input('email');
            $data->telp = $request->input('telp');
            $data->save();

            // Kembalikan respon JSON dengan pesan sukses
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diupdate',
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            // Jika terjadi error saat mengupdate data, kembalikan respon JSON dengan pesan error
            return response()->json([
                'success' => false,
                'message' => 'Error updating data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
