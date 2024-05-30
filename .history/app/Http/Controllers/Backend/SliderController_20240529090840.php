<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    //

    public function getSlider() {
        $slider = Slider::all();
        return response()->json($slider);

    }

    public function indexSlider() {
        $slider = Slider::all();
        return view('Backend.slider.index', [
            'slider' => $slider,
            'active' => 'admin/slider'
        ]);

    }

    public function saveSlider(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
            'img.*' => 'required|image',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $gambarPaths = [];

        try {
            if ($request->hasFile('img')) {
                foreach ($request->file('img') as $gambar) {
                    $namaGambar = time() . '-' . $gambar->getClientOriginalName();
                    $gambar->move(public_path('images/slider'), $namaGambar);
                    $gambarPaths[] = $namaGambar;
                }
            } else {
                throw new \Exception('Tidak ada file yang diupload.');
            }

            $slider = Slider::create([
                'title' => $request->title,
                'desc' => $request->desc,
                'gambar' => json_encode($gambarPaths),
                'status' => '0',
            ]);

            return response()->json(['message' => 'Data Slider Berhasil Ditambah', 'slider' => $slider], 201);
        } catch (\Exception $e) {
            \Log::error('Error creating slider: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }
    }


    public function getDataForEdit($id) {
        $slider = Slider::find($id);
        return response()->json($slider);

    }

    public function updateSlider(Request $request, $id) {
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

            return response()->json(['message' => 'Data SLider Berhasil Diubah']);
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
