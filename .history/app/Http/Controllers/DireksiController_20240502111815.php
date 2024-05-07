<?php

namespace App\Http\Controllers;

use App\Models\Direksi;
use Illuminate\Http\Request;

class DireksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Backend.direksi.index', [
            'direksi' => Direksi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Backend.direksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         // Validasi input
         $request->validate([
            'nama' => 'required|string',
            'nip' => 'required|string|unique:employees,nip',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
            'jabatan' => 'required|string',
            'status' => 'required|string',
        ]);

        // Simpan foto ke folder public
        $foto = $request->file('foto')->store('employees_photos', 'public');

        // Simpan data ke dalam database
        Direksi::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'foto' => $foto, // Simpan nama file foto ke dalam database
            'jabatan' => $request->jabatan,
            'status' => $request->status,
        ]);

        // Redirect ke halaman awal atau halaman lain yang Anda tentukan
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Direksi $direksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Direksi $direksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Direksi $direksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Direksi $direksi)
    {
        //
    }
}
