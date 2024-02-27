<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;
    public function tujuans()
    {
        return $this->belongsTo(Tujuan::class, 'id_tujuans');
    }
}
