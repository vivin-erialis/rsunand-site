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
