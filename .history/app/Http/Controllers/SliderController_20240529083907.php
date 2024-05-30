<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

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

    public function saveSlider() {

    }

    public function getDataForEdit() {

    }

    public function updateSlider() {

    }

    public function hapusSlider() {

    }
}
