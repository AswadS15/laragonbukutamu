<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use App\Models\Pengunjung;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UploadController extends Controller
{
    public function uploadGambar(Request $request, $id)
    {


        $request->validate([
            'gambar.*' => 'required|mimes:jpeg,png,jpg,gif',
        ]);
        $files = $request->file('gambar');

        foreach ($files as $file) {

            $extensi = $file->extension();

            $ubah = time() . rand(100, 999) . "." . $extensi;

            $file->storeAs('public/dokumentasi', $ubah);

            // Simpan informasi file di database
            $gambars = new Dokumentasi;
            $gambars->gambar = $ubah;
            $gambars->id_tujuans = $id;
            $gambars->save();
        }
        Alert::success('Berhasil', 'Dokumentasi Telah Ditambahkan');

        return redirect()->back();
    }

    public function deleteImage(Request $request, $id)
    {


        $dokumentasi = Dokumentasi::find($id);
        Storage::disk('public')->delete('dokumentasi/' . $dokumentasi->gambar);
        $dokumentasi->delete();

        Alert::success('Berhasil', 'Dokumentasi berhasil dihapus');


        return redirect()->back();
    }
    public function downloadImg($id)
    {


        $dokumentasi = Dokumentasi::find($id);
        $filePath = 'dokumentasi/' . $dokumentasi->gambar;

        if (Storage::disk('public')->exists($filePath)) {
            return response()->download(storage_path("app/public/public/{$filePath}"));
        } else {
            // File tidak ditemukan, berikan tanggapan kesalahan
            return response()->json(['error' => 'File not found'], 404);
        }

        Alert::success('Berhasil', 'Dokumentasi berhasil dihapus');


        return redirect()->back();
    }
}
