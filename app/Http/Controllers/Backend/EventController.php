<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    //

    public function getEvent()
    {
        $event = Event::all()->map(function ($event) {
            return [
                'nama_event' => $event->nama_event,
                'lokasi' => $event->lokasi,
                'deskripsi' => $event->deskripsi,
                'tanggal_awal' => Carbon::parse($event->tanggal_awal)->format('d-M-Y'),
                'tanggal_akhir' => Carbon::parse($event->tanggal_akhir)->format('d-M-Y'),
                'jam_awal' => Carbon::parse($event->jam_awal)->format('H:i'),
                'jam_akhir' => Carbon::parse($event->jam_akhir)->format('H:i')
            ];
        });

        return response()->json([
            'event' => $event
        ]);
    }
    public function indexEvent()
    {
        $event = Event::all();
        return view('Backend.event.index', [
            'event' => $event,
            'active' => 'admin/event',
        ]);
    }
    public function saveEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_event' => 'required|string',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        DB::beginTransaction();

        try {
            $gambarPaths = [];

            foreach ($request->file('gambar') as $gambar) {
                $namaGambar = time() . '-' . $gambar->getClientOriginalName();
                $gambar->move(public_path('images/event'), $namaGambar);
                $gambarPaths[] = $namaGambar;
            }

            $event = Event::create([
                'nama_event' => $request->nama_event,
                'lokasi' => $request->lokasi,
                'desc' => $request->desc,
                'tanggal_awal' => $request->tanggal_awal,
                'tanggal_akhir' => $request->tanggal_akhir,
                'jam_awal' => $request->jam_awal,
                'jam_akhir' => $request->jam_akhir,
                'gambar' => json_encode($gambarPaths),
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Data Event Berhasil Ditambah',
                'event' => $event
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            foreach ($gambarPaths as $gambar) {
                Storage::delete('public/images/event/' . $gambar); // hapus gambar dari storage jika terjadi rollback
            }

            \Log::error($e); // Log the error
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }
    }

    public function getDataForEdit($id)
    {
        $event = Event::find($id);
        return response()->json($event);
    }

    public function hapusEvent($id)
    {
        $event = Event::find($id);
        if (!$event) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        // Decode JSON gambar paths
        $gambarPaths = json_decode($event->gambar, true);

        DB::beginTransaction();

        try {
            if (is_array($gambarPaths)) {
                // Hapus gambar terkait dari folder penyimpanan
                foreach ($gambarPaths as $gambarPath) {
                    $filePath = public_path('images/event/' . $gambarPath);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

            $event->delete();

            DB::commit();

            return response()->json(['message' => 'Data berhasil dihapus.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Gagal menghapus data: ' . $e->getMessage()], 500);
        }
    }
}
