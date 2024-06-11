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

        $slug = Str::limit(Str::slug($request->judul), 50, '');

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();

        try {

           $video = Video::create([
                'judul' => $request->judul,
                'link' => $request->link,
                'url' => $slug,
            ]);

            DB::commit();

            return response()->json(['message' => 'Data Video Berhasil Ditambah', 'fasilitas' =>$video], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e); // Log the error
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }
    }

    // Cari data edit
    public function getDataForEdit($id)
    {
        $fasilitas = Video::find($id);
        return response()->json($fasilitas);
    }

    public function updateVideo(Request $request, $id)
    {
        try {
            $slug = Str::limit(Str::slug($request->judul), 50, '');

            $fasilitas = Fasilitas::find($id);

            if (!$fasilitas) {
                return response()->json(['error' => 'Data Video tidak ditemukan'], 404);
            }

            Video::find($id)->update([
                'judul' => $request->judul,
                'link' => $request->link,
                'url' => $slug,
            ]);

            return response()->json(['message' => 'Data Fasilitas Berhasil Diubah']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui data: ' . $e->getMessage()]);
        }
    }

    public function hapusFasilitas($id)
    {
        $fasilitas = Fasilitas::find($id);
        if (!$fasilitas) {
            return response()->json(['message' => 'fasilitas tidak ditemukan.'], 404);
        }

        // Decode JSON gambar paths
        $gambarPaths = json_decode($fasilitas->gambar, true);

        DB::beginTransaction();

        try {
            if (is_array($gambarPaths)) {
                // Hapus gambar terkait dari folder penyimpanan
                foreach ($gambarPaths as $gambarPath) {
                    $filePath = public_path('images/fasilitas/' . $gambarPath);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

            // Hapus fasilitas dari database
            $fasilitas->delete();

            DB::commit();

            return response()->json(['message' => 'Fasilitas berhasil dihapus.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Gagal menghapus Fasilitas: ' . $e->getMessage()], 500);
        }
    }
}

}