<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tujuan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'id_pengunjungs');
    }

    public function ulasan()
    {
        return $this->hasOne(Ulasan::class, 'id_tujuan');
    }
    public function tujuan()
    {
        return $this->belongsTo(Divisi::class, 'id_divisi');
    }

    // public function ulasan()
    // {
    //     return $this->hasOne(Ulasan::class, 'id_tujuan');
    // }

}
