<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\spesialis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Backend.dokter.index', [
            'active' => 'admin/dokter',
            'dokter' => Dokter::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Backend.dokter.create', [
            'spesialis' => spesialis::all(),
            'active' => 'admin/dokter',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'spesialis_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->hasFile('foto')) {
            $foto = time() . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('images/dokter'), $foto);
            $validate['foto'] = $foto;
        }

        $dokter = Dokter::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'foto' => $foto,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pendidikan' => $request->pendidikan,
            'spesialis_id' => $request->spesialis_id

        ]);

        return redirect('admin/dokter')->with('pesan', 'Data Dokter Berhasil Ditambah');
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
        return view('Backend.dokter.edit', [
            'dokter' => Dokter::find($id),
            'spesialis' => spesialis::all(),
            'active' => 'admin/dokter'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg', // 'required' removed to make it optional
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'spesialis_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Find the doctor by ID
        $dokter = Dokter::find($id);
        if (!$dokter) {
            return response()->json(['error' => 'Data Dokter tidak ditemukan'], 404);
        }

        // Check if a new file is uploaded
        if ($request->hasFile('foto')) {
            // Delete the old photo if it exists
            if ($dokter->foto && file_exists(public_path('images/dokter/' . $dokter->foto))) {
                unlink(public_path('images/dokter/' . $dokter->foto));
            }

            // Save the new photo
            $foto = time() . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('images/dokter'), $foto);
            $dokter->foto = $foto;
        }

        // Update the doctor data
        $dokter->nama = $request->nama;
        $dokter->nip = $request->nip;
        $dokter->tempat_lahir = $request->tempat_lahir;
        $dokter->tanggal_lahir = $request->tanggal_lahir;
        $dokter->pendidikan = $request->pendidikan;
        $dokter->spesialis_id = $request->spesialis_id;

        $dokter->save();

        return redirect('admin/dokter')->with('pesan', 'Data Dokter Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dokter = Dokter::where('id', $id)->first();
        File::delete('../images/dokter/' . $dokter->gambar);
        Dokter::destroy($id);
        return redirect('admin/dokter')->with('pesan', 'Data Dokter Berhasil Dihapus');
    }
}
