<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function getSlider() {
        $slider = Slider::all();
        return view('Backend.slider.index', [
            'slider' => $slider
        ]);

    }

    public function indexSlider() {

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
