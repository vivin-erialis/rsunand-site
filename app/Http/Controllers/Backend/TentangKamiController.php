<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TentangKami;
use App\Models\M_Perkembangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TentangKamiController extends Controller
{
    //
    public function indexProfile()
    {
        $tentangKami = TentangKami::all();
        foreach ($tentangKami as $d) {
            $d->foto_url = asset('images/profile/' . $d->struktur_organisasi);
        }
        return view('Backend.profile.index', [
            'active' => 'admin/profile',
            'profile' => $tentangKami,

        ]);
    }

    public function getProfile()
    {
        $profile = TentangKami::all();
        $perkembangan = M_Perkembangan::all();
        foreach ($profile as $d) {
            $d->foto_url = asset('images/profile/' . $d->struktur_organisasi);
        }

        return response()->json([
            'active' => 'admin/profile',
            'profile' => $profile,
            'perkembangan'  => $perkembangan
        ]);
    }


    //Menyimpan data
    public function saveProfile(Request $request)
    {

        // Simpan data ke database menggunakan transaksi
        DB::beginTransaction();
        try {


            // Handle file upload
            if ($request->hasFile('struktur_organisasi')) {
                $foto = time() . '_' . $request->file('struktur_organisasi')->getClientOriginalName();
                $request->file('struktur_organisasi')->move(public_path('images/profile'), $foto);
            }

            $data = new TentangKami();
            $data->perkembangan = $request->input('perkembangan');
            $data->sejarah = $request->input('sejarah');
            $data->visi_misi = $request->input('visi_misi');
            $data->struktur_organisasi = $foto;
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
        $perkembangan = M_Perkembangan::find($id);
        return response()->json($perkembangan);
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
            $data->visi_misi = $request->input('visi_misi');
            $data->email = $request->input('email');
            $data->telp = $request->input('telp');
            $data->alamat = $request->input('alamat');

            // Handle file upload
            if ($request->hasFile('foto')) {
                // Hapus file lama jika ada
                if ($data->foto && file_exists(storage_path('../images/profile' . $data->struktur_organisasi))) {
                    unlink(storage_path('../images/profile' . $data->struktur_organisasi));
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

    public function indexPerkembangan()
    {
        return view('Backend.profile.perkembangan.index', [
            'active' => 'admin/perkembangan'
        ]);
    }

    public function addPerkembangan(Request $request) {
        DB::beginTransaction();
        try {
            // Validasi request
            $validated = $request->validate([
                'title_perkembangan' => 'required|string|max:255',
                'perkembangan' => 'required|string',
            ]);

            // Inisialisasi objek data
            $data = new M_Perkembangan();  // Ganti Perkembangan dengan nama model yang sesuai

            // Set properti dari request
            $data->title_perkembangan = $validated['title_perkembangan'];
            $data->desc_perkembangan = $validated['perkembangan'];

            // Simpan data ke database
            $data->save();

            // Komit transaksi jika berhasil
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully',
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error saving data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function updatePerkembangan(Request $request, $id)
    {
        // Temukan data berdasarkan ID
        $data = M_Perkembangan::find($id);

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
    public function indexVisiMisi()
    {
        return view('Backend.profile.visi misi.index', [
            'active' => 'admin/visi-misi'
        ]);
    }

    public function updateVisiMisi(Request $request, $id)
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

            $data->visi_misi = $request->input('visi_misi');

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

    public function indexStrukturOrganisasi()
    {
        return view('Backend.profile.struktur organisasi.index', [
            'active' => 'admin/struktur-organisasi',
        ]);
    }

    public function updateStrukturOrganisasi(Request $request, $id)
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
            if ($request->hasFile('struktur_organisasi')) {
                // Hapus gambar lama jika ada
                if ($data->struktur_organisasi && File::exists(public_path('images/profile/' . $data->struktur_organisasi))) {
                    File::delete(public_path('images/profile/' . $data->struktur_organisasi));
                }

                // Simpan gambar baru
                $struktur_organisasi = time() . '_' . $request->file('struktur_organisasi')->getClientOriginalName();
                $request->file('struktur_organisasi')->move(public_path('images/profile'), $struktur_organisasi);
                $data->struktur_organisasi = $struktur_organisasi;
            }

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
