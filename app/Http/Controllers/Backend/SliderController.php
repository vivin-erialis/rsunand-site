<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        try {

            $gambarlama = Slider::where('id', $id)->first();

            if ($request->hasFile('img')) {
                foreach ($request->file('img') as $gambar) {
                    $namaGambar = time() . '-' . $gambar->getClientOriginalName();
                    $gambar->move(public_path('images/slider'), $namaGambar);
                    // Simpan nama gambar ke database atau lakukan operasi lainnya
                }
            }

            // Update data  setelah mengunggah gambar
            Slider::find($id)->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'status' => '0',
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
        $slider = Slider::find($id);
        if (!$slider) {
            return response()->json(['message' => 'Slider tidak ditemukan.'], 404);
        }

        $slider->delete();


        return response()->json(['message' => 'Slider berhasil dihapus.']);
    }
}
