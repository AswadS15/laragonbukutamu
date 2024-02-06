<?php

namespace App\Jobs;

use App\Mail\EmailPengunjung;
use Illuminate\Bus\Queueable;
use App\Mail\EmailPengunjung2;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class KirimEmailPengunjung implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $pesan;
    public $pengunjung;
    public $admin;
    public $waktu;
    public $respon;
    public $email;


    public function __construct($pesan)
    {
        $this->pengunjung = $pesan['pengunjung'];
        $this->admin = $pesan['admin'];
        $this->waktu = $pesan['waktu'];
        $this->email = $pesan['pengunjung']->pengunjung->email;
        $this->respon = $pesan['respon'];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->respon == 1) {
            Mail::to($this->email)->send(new EmailPengunjung($this->pengunjung, $this->admin, $this->waktu, $this->respon, $this->email));
        }
        if ($this->respon == 2) {
            Mail::to($this->email)->send(new EmailPengunjung2($this->pengunjung, $this->admin, $this->waktu, $this->respon, $this->email));
        }
    }
}
