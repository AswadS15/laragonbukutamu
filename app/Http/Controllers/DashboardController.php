<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $pengunjung = Pengunjung::all();
        $tatausaha = Pengunjung::where('id_divisi', '=', 1)->count();
        $isdhtl = Pengunjung::where('id_divisi', '=', 2)->count();
        $pkh = Pengunjung::where('id_divisi', '=', 3)->count();
        $divisiT = Pengunjung::where('id_divisi')->count();
        $T = Pengunjung::count();

        $hari1 = Pengunjung::whereDate('created_at', today())->count();
        $hari2 = Pengunjung::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $hari3 = Pengunjung::whereMonth('created_at', now())->count();
        $totalTahunan = Pengunjung::whereYear('created_at', now()->year)->count();
        return view('dashboard.index', compact(
            'pengunjung',
            'tatausaha',
            'isdhtl',
            'pkh',
            'T',
            'hari1',
            'hari2',
            'hari3',
            'totalTahunan',
            'user',
        ));
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
        //
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
        //
    }
}
