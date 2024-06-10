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
        $foto = '';
        if ($request->hasFile('img')) {
            $foto = time() . '_' . $request->file('img')->getClientOriginalName();
            $request->file('img')->move(public_path('images/slider'), $foto);
        }

        // Transaksi database
        DB::beginTransaction();
        try {
            // Simpan data ke database
            $slider = new Slider;
            $slider->title = $request->input('title');
            $slider->desc = $request->input('desc');
            $slider->img = $foto; // Menyimpan gambar sebagai JSON
            $slider->status = '0';
            $slider->save();

            DB::commit();

            // Mengembalikan respons JSON
            return response()->json([
                'success' => true,
                'message' => 'Slider berhasil disimpan!',
                'data' => $slider,
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Gagal menyimpan data: ' . $e->getMessage()], 500);
        }
    }

    public function getDataForEdit($id)
    {
        $slider = Slider::find($id);
        return response()->json($slider);
    }

    public function updateSlider(Request $request, $id)
    {
        try {
            // Ambil data slider
            $slider = Slider::findOrFail($id);

            // Ambil nama gambar lama
            $namaGambarLama = $slider->img;

            // Jika terdapat file gambar baru, hapus gambar lama
            if ($request->hasFile('img')) {
                if (File::exists(public_path('images/slider/' . $namaGambarLama))) {
                    File::delete(public_path('images/slider/' . $namaGambarLama));
                }
            }

            // Simpan gambar baru dan nama gambar
            $foto = '';
            if ($request->hasFile('img')) {
                $gambarBaru = $request->file('img');
                $namaGambar = time() . '-' . $gambarBaru->getClientOriginalName();
                $gambarBaru->move(public_path('images/slider'), $namaGambar);
                $foto = $namaGambar;
            }

            // Update data slider
            $slider->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'status' => '0',
                'img' => $foto ?: $namaGambarLama,
            ]);

            return response()->json(['message' => 'Data Slider Berhasil Diubah']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui data: ' . $e->getMessage()]);
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
