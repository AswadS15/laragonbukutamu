<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ulasan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class, 'id_tujuan');
    }
    public function Pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'id_pengunjungs');
    }
}
