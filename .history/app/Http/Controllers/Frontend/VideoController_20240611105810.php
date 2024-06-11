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
        return view('Frontend.video.video', [
            'headerStart' => 'Video',
            'video' => $video
        ]);
    }

    public function detailVideo($id) {
        return view('Frontend.video.detail-video', [
            'headerStart' => Video::where('url', $id)->first()->title,
            'video' => Video::where('url', $id)->first(),
        ]);
    }

}
