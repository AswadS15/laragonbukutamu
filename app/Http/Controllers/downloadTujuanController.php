<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use PDF;

class downloadTujuanController extends Controller
{
    public function index()
    {
        $tujuan = Tujuan::with('pengunjung');

        // $pengunjung = Pengunjung::latest()->paginate(5);


        return view('downloadPdf.viewTujuan', compact('tujuan'));
    }


    // public function downloadDataPelayanan()
    // {
    //     $mpdf = new \Mpdf\Mpdf();
    //     $tujuan = Tujuan::with('pengunjung');
    //     $mpdf->WriteHTML(view('downloadPdf.viewTujuan', compact('tujuan')));
    //     $mpdf->Output();
    // }


    public function getDetailDataPelayanan($id)
    {
        $tujuan = Tujuan::with('pengunjung')->find($id);
        return view('downloadPdf.viewDetailDataPelayanan', compact('tujuan'));
    }

    public function downloadDetailDataPelayanan($id)
    {

        $tujuan = Tujuan::with('pengunjung')->find($id);
        $pdf = Pdf::loadView('downloadPdf.viewDetailDataPelayanan', ['tujuan' => $tujuan]);
        return $pdf->download('DetailPelayanan.pdf');
    }

    // PDF DATA PENGUNJUNG
    public function getPengunjung()
    {
        $tujuan = Pengunjung::all();
        return view('downloadPdf.viewPengunjung', ['tujuan' => $tujuan]);
    }
    public function downloadPengunjung()
    {

        $tujuan = Pengunjung::latest()->get();
        $pdf = PDF::loadView('downloadPdf.viewPengunjung', ['tujuan' => $tujuan]);
        return $pdf->download('Pengunjung.pdf');
    }

    // PDF DATA PELAYANAN
    public function getPelayanan()
    {
        $pelayanan = Tujuan::with('pengunjung')->latest()->get();
        return view('downloadPdf.viewDataPelayanan', ['pelayanan' => $pelayanan]);
    }
    public function downloadPelayanan()
    {

        $pelayanan = Tujuan::with('pengunjung')->latest()->get();
        $pdf = PDF::loadView('downloadPdf.viewDataPelayanan', ['pelayanan' => $pelayanan]);
        return $pdf->download('DataPelayanan.pdf');
    }
}
