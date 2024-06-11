<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    //
    public function indexVideo()
    {
        return view('Backend.video.index', [
            'active' => 'admin/video',
            'video' => Video::all(),

        ]);
    }

    public function getVideo()
    {
        $video = Video::all();
        return response()->json([
            'active' => 'admin/video',
            'video' => $video,
        ]);

    }

    public function saveVideo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'link' => 'required',
        ]);

        $slug = Str::limit(Str::slug($request->nama), 50, '');

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $gambarPaths = [];

        DB::beginTransaction();

        try {

           $video = Video::create([
                'judl' => $request->judl,
                'link' => $request->link,
                'url' => $slug,
            ]);

            DB::commit();

            return response()->json(['message' => 'Data Fasilitas Berhasil Ditambah', 'fasilitas' =>$video], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e); // Log the error
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }
    }

    // Cari data edit
    public function getDataForEdit($id)
    {
        $fasilitas = Fasilitas::find($id);
        return response()->json($fasilitas);
    }

}
