<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Divisi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['divisi_type'];

    public function pengunjungs()
    {
        return $this->hasMany(Pengunjung::class, 'id_divisi');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id_divisi', 'id');
    }

    public function tujuans()
    {
        return $this->hasMany(Tujuan::class, 'id_divisi');
    }
}
