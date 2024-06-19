<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Direksi;
use App\Models\Jabatan;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class ManajemenController extends Controller
{
    //
    public function getDireksi()
    {
        $manajemen = DB::table('m_jabatan_det')
            ->join('m_jabatan', 'm_jabatan_det.id_jabatan', 'm_jabatan.id_jabatan')
            ->join('dokters', 'm_jabatan_det.id_dokter', '=', 'dokters.id')
            ->select('m_jabatan_det.*', 'dokters.*', 'm_jabatan.*')
            ->get();


        // Menambahkan URL foto ke setiap direksi
        foreach ($manajemen as $d) {
            $d->foto_url = asset('images/dokter/' . $d->foto);
        }

        return response()->json([
            'manajemen' => $manajemen
        ]);
    }

    public function indexDireksi()
    {
        $manajemen = DB::table('m_jabatan_det')
            ->join('dokters', 'm_jabatan_det.id_dokter', '=', 'dokters.id')
            ->select('m_jabatan_det.*', 'dokters.*')
            ->first();
        return view('Backend.manajemen.index', [
            'active' => 'admin/manajemen',
            'manajemen' => $manajemen,
            'dokter' => Dokter::all(),
            'jabatan' => Jabatan::all(),
            'bidang' => DB::table('m_bidang')->get(),
        ]);
    }
    public function saveDireksi(Request $request)
    {
        // Validasi request
        $validator = Validator::make($request->all(), [
            // 'id_bidang'               => 'required',
            'pegawai'               => 'required|string',
            'jabatan'               => 'required|string',
            // 'periode_jabatan_awal'  => 'required',
            // 'periode_jabatan_akhir' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::beginTransaction();

        try {

            $direksi = Direksi::create([
                'id_dokter'             => $request->pegawai,
                'id_bidang'             => $request->id_bidang,
                'id_jabatan'            => $request->jabatan,
                'periode_jabatan_awal'  => $request->periode_jabatan_awal,
                'periode_jabatan_akhir' => $request->periode_jabatan_akhir,
                'status'                => 0
            ]);

            DB::commit();

            return response()->json(['message' => 'Data Berhasil Ditambah']);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data', 'error' => $e->getMessage()], 500);
        }
    }

    public function getDataForEdit($id_jabatan)
    {
        $manajemen = DB::table('m_jabatan_det')
            ->join('m_jabatan', 'm_jabatan_det.id_jabatan', 'm_jabatan.id_jabatan')
            ->join('dokters', 'm_jabatan_det.id_dokter', '=', 'dokters.id')
            ->where('m_jabatan_det.id_jabatan', '=', $id_jabatan)
            ->select('m_jabatan_det.*', 'dokters.*', 'm_jabatan.*')
            ->first();

        return response()->json($manajemen);
    }

    public function updateDireksi(Request $request, $id_jabatan)
    {
        // Validasi request
        $validator = Validator::make($request->all(), [
            'id_bidang'               => 'required',
            'pegawai'                 => 'required|string',
            'jabatan'                 => 'required|string',
            'periode_jabatan_awal'    => 'required',
            'periode_jabatan_akhir'   => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        DB::beginTransaction();

        try {
            // Temukan entitas Direksi berdasarkan ID jabatan
            $direksi = DB::table('m_jabatan_det')
                ->where('id_jabatan', $id_jabatan)
                ->first();

            if (!$direksi) {
                return response()->json(['message' => 'Data Direksi tidak ditemukan'], 404);
            }

            // Update nilai-nilai yang sesuai
            DB::table('m_jabatan_det')
                ->where('id_jabatan', $id_jabatan)
                ->update([
                    'id_dokter' => $request->pegawai,
                    'id_bidang' => $request->id_bidang,
                    'id_jabatan' => $request->jabatan,
                    'periode_jabatan_awal' => $request->periode_jabatan_awal,
                    'periode_jabatan_akhir' => $request->periode_jabatan_akhir
                ]);

            DB::commit();

            return response()->json(['message' => 'Data Direksi berhasil diperbarui']);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'Terjadi kesalahan saat memperbarui data Direksi', 'error' => $e->getMessage()], 500);
        }
    }
    public function editStatus(Request $request, $id)
    {
        $direksi = Direksi::findOrFail($id);
        $direksi->status = $request->status;
        $direksi->save();

        return response()->json(['message' => 'Status direksi berhasil diperbarui']);
    }

    public function hapusDireksi($id_jabatan)
    {
        $manajemen = DB::table('m_jabatan_det')
            ->join('m_jabatan', 'm_jabatan_det.id_jabatan', 'm_jabatan.id_jabatan')
            ->join('dokters', 'm_jabatan_det.id_dokter', '=', 'dokters.id')
            ->where('m_jabatan_det.id_jabatan', '=', $id_jabatan)
            ->select('m_jabatan_det.*', 'dokters.*', 'm_jabatan.*')
            ->first();
        if (!$manajemen) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        // Hapus data dari tabel m_jabatan_det
        DB::table('m_jabatan_det')
            ->where('id_jabatan', $id_jabatan)
            ->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
