<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesan;
use App\Models\Divisi;
use App\Models\Tujuan;
use App\Models\Ulasan;
use App\Models\Pengunjung;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\KirimEmailAdmin;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Jobs\KirimEmailKeKepalaDivisi;
use App\Events\ServiceRequestSubmitted;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StorePengunjungRequest;
use App\Http\Requests\UpdatePengunjungRequest;
use App\Notifications\ServiceRequestNotification;


class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hari = Pengunjung::whereDate('created_at', today())->count();
        $hari2 = Pengunjung::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $hari3 = Pengunjung::whereMonth('created_at', now())->count();
        $puas = Ulasan::where('reaksi', 'puas')->count();
        $tidakpuas = Ulasan::where('reaksi', 'kurang puas')->count();
        $pelayanan = Pengunjung::all();
        $divisi = Divisi::all();

        return view('home.index', compact('hari', 'hari2', 'hari3', 'puas', 'tidakpuas', 'pelayanan', 'divisi'));
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

        $request->validate([
            'nama' => 'required|unique:pengunjungs|max:255',
            'instansi' => 'required',
            'alamat' => 'required',
            'hp' => ['required', 'regex:/^(\+62|62|0)8[0-9]{8,15}$/'],
            'email' => 'required|email|unique:pengunjungs,email|regex:/@gmail\.com$/i',
            'divisi' => 'required',
            'tujuan' => 'required',
        ]);



        // $pengunjung = Pengunjung::with('tujuans', 'divisi')->get();

        $fromEmail = User::where('id_divisi', $request->divisi)
            ->take(1)
            ->value('email');


        $tujuanss['excerpt'] = Str::limit(strip_tags($request->tujuan), 200);

        $nama = $request->nama;
        $instansi = $request->instansi;
        $alamat = $request->alamat;
        $hp = $request->hp;
        $email = $request->email;
        $divisi = $request->divisi;
        $tujuan = $tujuanss['excerpt'];

        $pengunjung = [
            'nama' => $request->nama,
            'instansi' => $request->instansi,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'email' => $request->email,
            'divisi' => $request->divisi,
            'tujuan' => $tujuan,
        ];

        $admin = User::where('id_divisi', $divisi)->first();
        $waktu = now('Asia/Makassar')->format('H');

        $pesan = [
            'pengunjung' => $pengunjung,
            'admin' => $admin,
            'email' => $fromEmail,
            'waktu' => $waktu,
        ];
        if (Pengunjung::where('hp', $hp)->exists()) {

            $idpengunjung = Pengunjung::where('hp', $hp)
                ->value('id');

            $tujuans = new Tujuan();
            $tujuans->id_pengunjungs = $idpengunjung;
            $tujuans->tujuan = $tujuan;
            $tujuans->save();


            KirimEmailKeKepalaDivisi::dispatch($pesan);

            Alert::success("Berhasil", "Terima Kasih $nama Sudah menggunakan layanan kami. Selanjutnya anda bisa menunggu validasi dari ADMIN berupa pesan EMAIL.");
            return redirect('/#layanan');
        } else {
            $data = new Pengunjung();
            $data->nama = $nama;
            $data->instansi = $instansi;
            $data->alamat = $alamat;
            $data->hp = $hp;
            $data->email = $email;

            $data->id_divisi = $divisi;
            $data->save();

            $idpengunjung = Pengunjung::where('hp', $hp)
                ->value('id');
            $tujuans = new Tujuan();
            $tujuans->id_pengunjungs = $idpengunjung;
            $tujuans->tujuan = $tujuan;
            $tujuans->save();
            KirimEmailKeKepalaDivisi::dispatch($pesan);
            Alert::success("Berhasil", "Terima Kasih $nama Sudah menggunakan layanan kami. Selanjutnya anda bisa menunggu validasi dari ADMIN berupa pesan EMAIL.");
            return redirect('/#layanan');
        }
    }


    public function ambil($hp)
    {

        $data = Pengunjung::where('hp', $hp)->first();

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengunjung $pengunjung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengunjung $pengunjung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengunjungRequest $request, Pengunjung $pengunjung)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengunjung $pengunjung)
    {
    }
}
