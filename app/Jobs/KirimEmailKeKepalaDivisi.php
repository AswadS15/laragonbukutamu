<?php

namespace App\Jobs;

use App\Mail\KirimEmailAdmin;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class KirimEmailKeKepalaDivisi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $pesan;
    public $pengunjung;
    public $admin;
    public $email;
    public $waktu;
    public function __construct($pesan)
    {
        $this->pengunjung = $pesan['pengunjung'];
        $this->admin = $pesan['admin'];
        $this->email = $pesan['email'];
        $this->waktu = $pesan['waktu'];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Mail::to($this->email)->send(new KirimEmailAdmin($this->pengunjung, $this->admin, $this->waktu));
    }
}
