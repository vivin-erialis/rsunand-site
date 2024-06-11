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

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {

            $validator = $request->sejarah;
            $validator = $request->email;
            $validator = $request->telp;
            $validator->save();

            // Return a success response
            return response()->json(['message' => 'Profile Disimpan'], 200);
        } catch (\Exception $e) {
            // Return an error response if something goes wrong
            return response()->json(['error' => 'An error occurred while updating the profile', 'details' => $e->getMessage()], 500);
        }
    }

    // Cari data edit
    public function getDataForEdit($id)
    {
        $profile = Artikel::find($id);
        return response()->json($profile);
    }

    // Edit Data
    public function updateProfile(Request $request, $id)
    {
        try {
            $slug = Str::limit(Str::slug($request->title), 50, '');

            $profile = Artikel::find($id);

            if (!$profile) {
                return response()->json(['error' => 'Data Artikel tidak ditemukan'], 404);
            }

            $gambarlama = json_decode($profile->gambar, true);

            // Hapus gambar-gambar lama
            foreach ($gambarlama as $gambar) {
                if (file_exists(public_path('images/artikel/' . $gambar))) {
                    unlink(public_path('images/artikel/' . $gambar));
                }
            }

            // Inisialisasi array baru untuk menyimpan nama gambar-gambar baru
            $gambarBaru = [];

            if ($request->hasFile('gambar')) {
                foreach ($request->file('gambar') as $gambar) {
                    $namaGambar = time() . '-' . $gambar->getClientOriginalName();
                    $gambar->move(public_path('images/artikel'), $namaGambar);
                    $gambarBaru[] = $namaGambar;
                }
            }

            // Update data artikel setelah mengunggah gambar
            Artikel::find($id)->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'isi' => $request->isi,
                'status' => '0',
                'url' => $slug,
                'kategori_id' => $request->kategori_id,
                'gambar' => json_encode($gambarBaru)
            ]);

            return response()->json(['message' => 'Data Artikel Berhasil Diubah']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui data: ' . $e->getMessage()]);
        }
    }


    public function editStatus(Request $request, $id)
    {
        $article = Artikel::findOrFail($id);
        $article->status = $request->status;
        $article->save();

        return response()->json(['message' => 'Status artikel berhasil diperbarui']);
    }

    public function hapusProfile($id)
    {
        $profile = Artikel::find($id);
        if (!$profile) {
            return response()->json(['message' => 'Artikel tidak ditemukan.'], 404);
        }

        // Decode JSON gambar paths
        $gambarPaths = json_decode($profile->gambar, true);

        DB::beginTransaction();

        try {
            if (is_array($gambarPaths)) {
                // Hapus gambar terkait dari folder penyimpanan
                foreach ($gambarPaths as $gambarPath) {
                    $filePath = public_path('images/artikel/' . $gambarPath);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

            // Hapus artikel dari database
            $profile->delete();

            DB::commit();

            return response()->json(['message' => 'Artikel berhasil dihapus.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Gagal menghapus artikel: ' . $e->getMessage()], 500);
        }
    }
}
