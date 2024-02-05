<?php

namespace Database\Seeders;

use App\Models\Pengunjung;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengunjungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Pengunjung::factory()->count(10)->create();
    }
}
