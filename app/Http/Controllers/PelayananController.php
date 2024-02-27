<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\Tujuan;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PelayananController extends Controller
{
    /**p
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengunjung = Pengunjung::with('tujuans', 'divisi')->latest()->paginate(5);
        $user = Auth::user();


        return view('pengunjung.index', compact('pengunjung', 'user',));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
    public function showPelayanan(Request $request)
    {
        $pengunjungs_id = Pengunjung::where('hp', $request->hp)
            ->take(1)
            ->value('id');

        $tujuans = Tujuan::with('pengunjung', 'dokumentasis')->where('id_pengunjungs', $pengunjungs_id)
            ->get();




        return view('dataPelayanan/show', compact('tujuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengunjung = Pengunjung::find($id);
        $tujuan = Tujuan::with('pengunjung')->where('id_pengunjungs', $id)->latest()->paginate(5);
        return view('pengunjung.detail', compact('pengunjung', 'tujuan'));
    }

    public function isiPelayanan(string $id)
    {
        $tujuan = Tujuan::with('pengunjung', 'dokumentasis')->where('id', $id)->first();

        return view('dataPelayanan.isiPelayanan', compact('tujuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
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
        $pengunjung = Pengunjung::find($id);
        $pengunjung->delete();

        return redirect()->route('pengunjung.index');
    }
}
