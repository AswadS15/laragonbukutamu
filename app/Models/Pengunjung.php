<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengunjung extends Model
{
    use HasFactory;

    protected $fillable = ['id_divisi', 'instansi', 'nama', 'alamat', 'hp', 'tujuan', 'gambar'];

    public function divisi(): BelongsTo
    {
        return $this->belongsTo(Divisi::class, 'id_divisi');
    }
    public function tujuans()
    {
        return $this->hasMany(Tujuan::class, 'id_pengunjungs');
    }
}
