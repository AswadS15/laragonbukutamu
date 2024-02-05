<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Divisi::create(
            ['divisi_type'     => 'Tata Usaha']
        );

        Divisi::create(
            ['divisi_type'     => 'ISDHTL']
        );

        Divisi::create(
            ['divisi_type'     => 'PKH']
        );
    }
}
