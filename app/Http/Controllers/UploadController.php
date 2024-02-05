<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UploadController extends Controller
{
    public function uploadGambar(Request $request, $id)
    {



        $request->validate([
            'gambar' => 'required|mimes:jpeg,png,jpg,gif',
        ]);


        $file = $request->file('gambar');
        $extensi = $file->Extension();
        $ubah = time() . rand(100, 999) . "." . $extensi;

        $file->move(public_path() . '/storage/img/pengunjung', $ubah);

        // Simpan informasi file di database
        $tujuan = Tujuan::find($id);
        $tujuan->gambar = $ubah;
        $tujuan->save();
        Alert::success('Berhasil', 'Dokumentasi Telah Ditambahkan');

        return redirect()->back();
    }
}
