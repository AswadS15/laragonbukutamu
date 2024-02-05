<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Http\Requests\StoreDivisiRequest;
use App\Http\Requests\UpdateDivisiRequest;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisi = Divisi::paginate(5);

        return view('divisi.index', compact('divisi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDivisiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $divisi = Divisi::find($id);
        return view('divisi.detail', compact('divisi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divisi $divisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDivisiRequest $request, Divisi $divisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $divisi = Divisi::find($id);
        $divisi->delete();

        return redirect()->route('divisi.index')->with('status', 'Data Divisi Berhasil Dihapus');
    }
}
