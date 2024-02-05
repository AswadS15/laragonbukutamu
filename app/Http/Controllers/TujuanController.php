<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use GMP;
use App\Models\User;
use App\Models\Tujuan;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->id_divisi == 1) {
            $tujuan = Tujuan::with('pengunjung')
                ->whereHas('pengunjung.divisi', function ($query) {
                    $query->where('divisi_type', 'tata usaha');
                })
                ->latest()
                ->paginate(5);
            return view('dataPelayanan.index', compact('tujuan'));
        } elseif (auth()->user()->id_divisi == 2) {
            $tujuan = Tujuan::with('pengunjung')
                ->whereHas('pengunjung.divisi', function ($query) {
                    $query->where('divisi_type', 'ISDHTL');
                })
                ->latest()
                ->paginate(5);
            return view('dataPelayanan.index', compact('tujuan'));
        } elseif (auth()->user()->id_divisi == 3) {
            $tujuan = Tujuan::with('pengunjung')
                ->whereHas('pengunjung.divisi', function ($query) {
                    $query->where('divisi_type', 'PKH');
                })
                ->latest()
                ->paginate(5);
            return view('dataPelayanan.index', compact('tujuan'));
        } elseif (auth()->user()->role = "admin") {
            $tujuan = Tujuan::with('pengunjung')
                ->latest()
                ->paginate(5);

            return view('dataPelayanan.index', compact('tujuan'));
        } else {
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
        $tujuan = Tujuan::find($id);
        return view('dataPelayanan.detail', compact('tujuan'));
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
    public function changeStatus($id)
    {
        $getStatus = Tujuan::select('status')->where('id', $id)->first();

        $tujuan = Tujuan::with('pengunjung')->find($id);


        $emailDivisi = User::where('id_divisi', $tujuan->pengunjung->id_divisi)
            ->take(1)
            ->value('email');

        if ($getStatus->status == 0) {
            $status = 1;
            Tujuan::where('id', $id)->update(['status' => $status]);
        } elseif ($getStatus->status == 1) {
            $status = 2;
            Tujuan::where('id', $id)->update(['status' => $status]);
        } else {
            return redirect()->back()->with('error', 'Tidak dapat mengubah status');
        }
        return redirect()->route('dataPelayanan.index')->with('success', 'Status berhasil diubah');
    }

    public function ubah(Request $request, $id)
    {
        $getStatus = Tujuan::select('status')->where('id', $id)->first();
        if ($request->respon == 1) {
            if ($getStatus->status == 1) {
                $status = 2;
                Tujuan::where('id', $id)->update(['status' => $status]);
                return redirect()->back()->with('success', 'Status berhasil diubah');
            }
        } elseif ($request->respon == 2) {
            if ($getStatus->status == 1) {
                $status = 2;
                Tujuan::where('id', $id)->update(['status' => $status]);
                return redirect()->back()->with('success', 'Status berhasil diubah');
            }
        } else {
            return redirect()->back()->with('error', 'Status gagal diubah');
        }
    }
}
