<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use App\Models\Ulasan;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreUlasanRequest;
use App\Http\Requests\UpdateUlasanRequest;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $puas = Ulasan::where('reaksi', 'puas')->count();
        // $tidakpuas = Ulasan::where('reaksi', 'tidak puas')->count();

        return view('ulasan.index');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
    }

    public function showUlasan(Request $request)
    {


        $pengunjungs_id = Pengunjung::where('hp', $request->hp)
            ->take(1)
            ->value('id');


        $ulasan = Ulasan::with('pengunjung')->where('id_pengunjungs', $pengunjungs_id)->get();

        return view('ulasan/show', compact('ulasan'));
    }

    public function simpanUlasan(Request $request, $id)
    {
        $ulasans = Ulasan::where('id_pengunjungs', $id)->first();

        if ($ulasans) {
            $ulasans->reaksi = $request->reaksi;
            $ulasans->ulasan = $request->ulasan;

            $ulasans->save();
            return redirect('/')->with('success', 'Ulasan berhasil ditambahkan');
        } else {
            // Lakukan sesuatu jika $ulasan tidak ditemukan
            return redirect()->back()->with('error', 'Ulasan tidak ditemukan');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $validasi = $request->validate([
        //     'nama' => 'required|unique:ulasans,nama|string|max:255',
        //     'ulasan' => 'required|string|max:255',
        // ]);
        // Ulasan::create($validasi);

        // return redirect('/home#index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ulasan $ulasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ulasan $ulasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUlasanRequest $request, Ulasan $ulasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ulasan $ulasan)
    {
        //
    }
}
