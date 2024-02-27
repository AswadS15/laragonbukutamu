<?php

namespace App\Http\Controllers;

use GMP;
use App\Models\User;
use App\Models\Divisi;
use App\Models\Tujuan;
use App\Models\Pengunjung;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use App\Jobs\KirimEmailDivisi;
use App\Jobs\KirimEmailPengunjung;
use RealRashid\SweetAlert\Facades\Alert;

class TujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // dd(auth()->user()->id_divisi);
        if (auth()->user()->id_divisi) {
            $tujuan = Tujuan::with('pengunjung', 'divisi')->where('id_divisi', auth()->user()->id_divisi)->latest()->paginate(5);
            return view('dataPelayanan.index', compact('tujuan'));
        } elseif (auth()->user()->id_divisi == null) {

            $tujuan = Tujuan::with('pengunjung', 'divisi')->latest()->paginate(5);
            // dd($tujuan);

            return view('dataPelayanan.index', compact('tujuan'));
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $getStatus = Tujuan::select('status')->where('id', $id)->first();
        $tujuan = Tujuan::with('pengunjung', 'divisi')->find($id);
        $dokumentasis = Dokumentasi::where('id_tujuans', $id)->get();
        if ($tujuan->status == 0) {
            Tujuan::where('id', $id)->update(['status' => 1]);
        }
        return view('dataPelayanan.detail', compact('tujuan', 'dokumentasis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        $tujuan = Tujuan::find($id);
        $tujuan->delete();

        Alert::success('Berhasil', 'Data pelayanan berhasil dihapus');
        return redirect()->route('dataPelayanan.index');
    }
}
