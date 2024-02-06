<?php

namespace App\Jobs;

use App\Models\Divisi;
use App\Mail\EmailDivisi;
use App\Mail\EmailPengunjung;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class KirimEmailDivisi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $pesan;
    public $pengunjung;
    public $admin;
    public $waktu;
    // public $respon;
    public $email;
    public $emailDivisi;

    public function __construct($pesan)
    {
        $this->pengunjung = $pesan['pengunjung'];
        $this->admin = $pesan['admin'];
        $this->waktu = $pesan['waktu'];
        $this->emailDivisi = $pesan['emailDivisi'];
        // $this->email = $pesan['pengunjung']->pengunjung->email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->emailDivisi)->send(new EmailDivisi($this->pengunjung, $this->admin, $this->waktu));
    }
}
