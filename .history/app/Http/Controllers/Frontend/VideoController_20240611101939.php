<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    public function video() {
        $video = Video::all();
        return view('Frontend.video', [
            'headerStart' => 'Video',
            'video' => $video
        ]);
    }

    public function videoDetail() {
        $video = Video::all();
        return view('Frontend.video', [
            'headerStart' => 'Video',
            'video' => $video
        ]);
    }

}
