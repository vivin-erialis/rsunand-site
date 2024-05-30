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

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $gambarPaths = [];

        try {
            foreach ($request->file('img') as $gambar) {
                $namaGambar = time() . '-' . $gambar->getClientOriginalName();
                $gambar->move(public_path('images/slider'), $namaGambar);
                $gambarPaths[] = $namaGambar;
            }

            $slider = Slider::create([
                'title' => $request->title,
                'desc' => $request->desc,
                'isi' => $request->isi,
                'gambar' => json_encode($gambarPaths),
                'status' => '0',
            ]);

            return response()->json(['message' => 'Data Slider Berhasil Ditambah', 'slider' => $slider], 201);
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
