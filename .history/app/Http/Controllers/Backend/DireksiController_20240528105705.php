<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Direksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DireksiController extends Controller
{
    //
    public function getDireksi()
    {
        $direksi = Direksi::all();
        return response()->json($direksi);
    }

    public function indexDireksi()
    {
        $direksi = Direksi::all();

        return view('Backend.direksi.index', [
            'direksi' => $direksi,
            'active' => 'admin/direksi'
        ]);
    }

    public function saveDireksi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'nip' => 'required|string|unique:employees,nip',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
            'jabatan' => 'required|string',
        ]);


        if ($request->hasFile('foto')) {
            $foto = time() . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('images/direksi'), $foto);
            $validate['foto'] = $foto;
        }

        $direksi = Direksi::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'foto' => $foto, // Simpan nama file foto ke dalam database
            'jabatan' => $request->jabatan,
            'status' => '1',
        ]);
    }
}
