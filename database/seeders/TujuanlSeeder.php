<?php

namespace Database\Seeders;

use App\Models\Tujuan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TujuanlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tujuan::create([
            'id_pengunjungs' => 1, // Kosongkan id_pengunjungs atau isi dengan id pengunjung yang sesuai
            'status' => 0,
            'tujuan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis ipsa quidem necessitatibus ',
            'gambar' => null,
        ]);

        Tujuan::create([
            'id_pengunjungs' => 2, // Kosongkan id_pengunjungs atau isi dengan id pengunjung yang sesuai
            'status' => 0,
            'tujuan' => 'aperiam vero adipisci dolore quo id non reiciendis rerum ducimus perferendis, distinctio debitis mollitia vitae tempore ratione excepturi.',
            'gambar' => null,
        ]);
    }
}
