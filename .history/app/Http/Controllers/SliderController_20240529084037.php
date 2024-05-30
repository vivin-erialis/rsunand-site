<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
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

        $slug = Str::limit(Str::slug($request->title), 50, '');

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $gambarPaths = [];

        try {
            foreach ($request->file('gambar') as $gambar) {
                $namaGambar = time() . '-' . $gambar->getClientOriginalName();
                $gambar->move(public_path('images/artikel'), $namaGambar);
                $gambarPaths[] = $namaGambar;
            }

            $artikel = Artikel::create([
                'title' => $request->title,
                'desc' => $request->desc,
                'isi' => $request->isi,
                'gambar' => json_encode($gambarPaths),
                'status' => '0',
                'url' => $slug,
                'kategori_id' => $request->kategori_id
            ]);

            return response()->json(['message' => 'Data Artikel Berhasil Ditambah', 'artikel' => $artikel], 201);
        } catch (\Exception $e) {
            \Log::error($e); // Log the error
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }

    }

    public function getDataForEdit() {

    }

    public function updateSlider() {

    }

    public function hapusSlider() {

    }
}
