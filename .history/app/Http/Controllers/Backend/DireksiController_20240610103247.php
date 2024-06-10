<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Direksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class DireksiController extends Controller
{
    //
    public function getDireksi()
    {
        $direksi = Direksi::all();

        // Menambahkan URL foto ke setiap direksi
        foreach ($direksi as $d) {
            $d->foto_url = asset('images/direksi/' . $d->foto);
        }

        return response()->json([
            'direksi' => $direksi
        ]);
    }

    public function indexDireksi()
    {
        return view('Backend.direksi.index', [
            'active' => 'admin/direksi',
            'direksi' => Direksi::all(),
        ]);
    }
    public function saveDireksi(Request $request)
    {
        // Validasi input non-file
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'nip' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jabatan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        if (!$request->hasFile('foto')) {
            return response()->json(['message' => 'Foto tidak ditemukan.'], 400);
        }

        $file = $request->file('foto');

        // Validasi file tipe dan mime
        $fileValidator = Validator::make(['foto' => $file], [
            'foto' => 'image|mimes:jpeg,png,jpg,gif', // Hapus validasi ukuran di sini
        ]);

        if ($fileValidator->fails()) {
            return response()->json(['errors' => $fileValidator->errors()], 400);
        }

        DB::beginTransaction();

        try {
            $image = $file;
            $imageSize = $image->getSize();

            // Jika ukuran gambar melebihi 2MB, ubah ukuran gambar
            if ($imageSize > 2048 * 1024) {
                $resizedImage = Image::make($image)->resize(1024, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode('jpg', 75); // Sesuaikan kualitas sesuai kebutuhan

                $foto = time() . '_' . $image->getClientOriginalName();
                $path = public_path('images/direksi/' . $foto);
                $resizedImage->save($path);
            } else {
                // Simpan gambar asli jika ukurannya sudah sesuai
                $foto = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/direksi'), $foto);
            }

            // Buat entri direksi baru
            $direksi = Direksi::create([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'foto' => $foto,
                'jabatan' => $request->jabatan,
                'status' => '0',
            ]);

            DB::commit();

            return response()->json(['message' => 'Data Direksi Berhasil Ditambah']);
        } catch (\Exception $e) {
            DB::rollBack();

            // Hapus file yang sudah terupload jika terjadi error
            if (isset($foto) && file_exists(public_path('images/direksi/' . $foto))) {
                unlink(public_path('images/direksi/' . $foto));
            }

            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data', 'error' => $e->getMessage()], 500);
        }
    }

    public function getDataForEdit($id)
    {
        $direksi = Direksi::find($id);
        return response()->json($direksi);
    }

    public function updateDireksi(Request $request, $id)
{
    // Validasi request
    $validator = Validator::make($request->all(), [
        'nama' => 'required|string',
        'nip' => 'required|string',
        'tempat_lahir' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'jabatan' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }

    $direksi = Direksi::find($id);

    if (!$direksi) {
        return response()->json(['message' => 'Data Direksi tidak ditemukan'], 404);
    }

    DB::beginTransaction();

    try {
        if ($request->hasFile('foto')) {
            $fotoValidator = Validator::make($request->all(), [
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif', // Validasi untuk file gambar
            ]);

            if ($fotoValidator->fails()) {
                return response()->json(['errors' => $fotoValidator->errors()], 400);
            }

            // Hapus foto lama jika ada
            if (File::exists(public_path('images/direksi/' . $direksi->foto))) {
                File::delete(public_path('images/direksi/' . $direksi->foto));
            }

            $foto = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('images/direksi'), $foto);
            $direksi->foto = $foto;
        }

        $direksi->nama = $request->nama;
        $direksi->nip = $request->nip;
        $direksi->tempat_lahir = $request->tempat_lahir;
        $direksi->tanggal_lahir = $request->tanggal_lahir;
        $direksi->jabatan = $request->jabatan;
        $direksi->status = '0';
        $direksi->save();

        DB::commit();

        return response()->json(['message' => 'Data Berhasil Diubah']);
    } catch (\Exception $e) {
        DB::rollBack();

        // Hapus file yang sudah terupload jika terjadi error
        if (isset($foto) && File::exists(public_path('images/direksi/' . $foto))) {
            File::delete(public_path('images/direksi/' . $foto));
        }

        return response()->json(['message' => 'Terjadi kesalahan saat memperbarui data', 'error' => $e->getMessage()], 500);
    }
}

    public function editStatus(Request $request, $id)
    {
        $direksi = Direksi::findOrFail($id);
        $direksi->status = $request->status;
        $direksi->save();

        return response()->json(['message' => 'Status direksi berhasil diperbarui']);
    }

    public function hapusDireksi($id)
    {
        $direksi = Direksi::find($id);
        if (!$direksi) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        // Path foto
        $fotoPath = $direksi->foto;
        $filePath = public_path('images/direksi/' . $fotoPath);

        // Hapus file foto jika ada
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Hapus data direksi dari database
        $direksi->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

}
