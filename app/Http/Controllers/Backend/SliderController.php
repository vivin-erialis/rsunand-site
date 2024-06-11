<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class SliderController extends Controller
{
    //

    public function getSlider()
    {

        $slider = Slider::all();
        foreach ($slider as $d) {
            $d->foto_url = asset('images/slider/' . $d->img);
        }
        return response()->json([
            'slider' => $slider
        ]);
    }

    public function indexSlider()
    {
        $slider = Slider::all();
        return view('Backend.slider.index', [
            'slider' => $slider,
            'active' => 'admin/slider'
        ]);
    }

    public function saveSlider(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
            'img' => 'required|image',
        ]);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Menyimpan file gambar
         // Proses file foto
         if ($request->hasFile('img')) {
            $foto = time() . '_' . $request->file('img')->getClientOriginalName();
            $request->file('img')->move(public_path('images/slider'), $foto);
        }


        // Simpan data ke database
        $berita = new Slider;
        $berita->title = $request->input('title');
        $berita->desc = $request->input('desc');
        $berita->img = $foto; // Menyimpan gambar sebagai JSON
        $berita->status = '0';
        $berita->save();

        // Mengembalikan respons JSON
        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil disimpan!',
            'data' => $berita,
        ], 200);
    }
    public function getDataForEdit($id)
    {
        $slider = Slider::find($id);
        return response()->json($slider);
    }
    public function updateSlider(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg', // Buat opsional
        ]);

        // Jika validasi gagal, kembalikan pesan kesalahan sebagai respons JSON
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $slider = Slider::find($id);

        if (!$slider) {
            return response()->json(['error' => 'Data Slider tidak ditemukan'], 404);
        }

        DB::beginTransaction();

        try {
            // Periksa apakah file gambar baru diunggah
            if ($request->hasFile('img')) {
                // Hapus gambar lama jika ada
                if ($slider->img && File::exists(public_path('images/slider/' . $slider->img))) {
                    File::delete(public_path('images/slider/' . $slider->img));
                }

                // Simpan gambar baru
                $img = time() . '_' . $request->file('img')->getClientOriginalName();
                $request->file('img')->move(public_path('images/slider'), $img);
                $slider->img = $img;
            }

            // Update data slider
            $slider->title = $request->title;
            $slider->desc = $request->desc;

            $slider->save();

            DB::commit();

            return response()->json(['message' => 'Data Slider Berhasil Diubah']);
        } catch (\Exception $e) {
            DB::rollBack();

            // Hapus file yang sudah terupload jika terjadi error
            if (isset($img) && File::exists(public_path('images/slider/' . $img))) {
                File::delete(public_path('images/slider/' . $img));
            }

            return response()->json(['message' => 'Gagal memperbarui data: ' . $e->getMessage()], 500);
        }
    }


    public function editStatus(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->status = $request->status;
        $slider->save();

        return response()->json(['message' => 'Status artikel berhasil diperbarui']);
    }

    public function hapusSlider($id)
    {
        // Transaksi database
        DB::beginTransaction();
        try {
            $slider = Slider::find($id);
            if (!$slider) {
                return response()->json(['message' => 'Slider tidak ditemukan.'], 404);
            }

            // Hapus foto terkait
            $namaGambar = $slider->img;
            if (File::exists(public_path('images/slider/' . $namaGambar))) {
                File::delete(public_path('images/slider/' . $namaGambar));
            }

            // Hapus data slider
            $slider->delete();

            DB::commit();

            return response()->json(['message' => 'Slider berhasil dihapus.']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Gagal menghapus data: ' . $e->getMessage()]);
        }
    }
}
