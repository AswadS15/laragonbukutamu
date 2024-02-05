<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('admin123'),  // Menggunakan bcrypt untuk mengenkripsi password
                'id_divisi' => null,
            ],
            [
                'name' => 'pimpinan',
                'email' => 'pimpinan@gmail.com',
                'role' => 'pimpinan',
                'password' => bcrypt('pimpinan123'),
                'id_divisi' => null,
                // Menggunakan bcrypt untuk mengenkripsi password
            ],
            [
                'name' => 'Tata Usaha',
                'email' => 'aswadsupu5@gmail.com',
                'role' => 'kepala divisi',
                'password' => bcrypt('divisi123'),
                'id_divisi' => 1,
                // Menggunakan bcrypt untuk mengenkripsi password
            ],
            [
                'name' => 'ISDHL',
                'email' => 'aswadsupu4@gmail.com',
                'role' => 'kepala divisi',
                'password' => bcrypt('divisi123'),
                'id_divisi' => 2,
                // Menggunakan bcrypt untuk mengenkripsi password
            ],
            [
                'name' => 'PKH',
                'email' => 'moh.fikryansyah287@gmail.com',
                'role' => 'kepala divisi',
                'password' => bcrypt('divisi123'),
                'id_divisi' => 3,
                // Menggunakan bcrypt untuk mengenkripsi password
            ],
        ];

        // Masukkan data ke dalam tabel pengunjungs
        DB::table('users')->insert($data);
    }
}
