<?php

namespace App\Exports;

use App\Models\Pengunjung;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportDashboard implements FromView
{

    private $pengunjung;

    // Menambahkan parameter pada konstruktor untuk menerima data request
    public function __construct($pengunjung)
    {
        $this->pengunjung = $pengunjung;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {


        return view('downloadPdf.exportDataPengunjung', [
            'pengunjung' => $this->pengunjung
        ]);
    }
}
