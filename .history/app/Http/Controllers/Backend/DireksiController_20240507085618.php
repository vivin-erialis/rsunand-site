<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Direksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DireksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Backend.direksi.index', [
            'direksi' => Direksi::all(),
            'active' => 'admin/direksi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Backend.direksi.create', [
            'active' => 'admin/direksi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'nip' => 'required|string|unique:employees,nip',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
            'jabatan' => 'required|string',
            'status' => 'required|string',
        ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 422);
        // }

        if ($request->hasFile('foto')) {
            $foto = time().$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('images/direksi'), $foto);
            $validate['foto'] = $foto;
        }

        $dokter = Direksi::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'foto' => $foto, // Simpan nama file foto ke dalam database
            'jabatan' => $request->jabatan,
            'status' => $request->status,

        ]);

        return redirect('admin/direksi')->with('pesan', 'Data Direksi Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('Backend.direksi.edit', [
            'direksi' => Direksi::find($id),
            'active' => 'admin/direksi',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $direksi = Direksi::where('id', $id)->first();
        File::delete('images/artikel/' . $direksi->gambar);
        Direksi::destroy($id);
        return redirect('admin/artikel')->with('pesan', 'Data Artikel Berhasil Dihapus');
    }
}
