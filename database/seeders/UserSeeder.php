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
                'status' => 'offline',
            ],
            [
                'name' => 'pimpinan',
                'email' => 'aswadsupu6@gmail.com',
                'role' => 'pimpinan',
                'password' => bcrypt('pimpinan123'),
                'id_divisi' => 4,
                'status' => 'offline',
                // Menggunakan bcrypt untuk mengenkripsi password
            ],
            [
                'name' => 'Tata Usaha',
                'email' => 'aswadsupu5@gmail.com',
                'role' => 'kepala divisi',
                'password' => bcrypt('divisi123'),
                'id_divisi' => 1,
                'status' => 'offline',
                // Menggunakan bcrypt untuk mengenkripsi password
            ],
            [
                'name' => 'ISDHL',
                'email' => 'aswadsupu4@gmail.com',
                'role' => 'kepala divisi',
                'password' => bcrypt('divisi123'),
                'id_divisi' => 2,
                'status' => 'offline',
                // Menggunakan bcrypt untuk mengenkripsi password
            ],
            [
                'name' => 'PKH',
                'email' => 'aswadbola01@gmail.com',
                'role' => 'kepala divisi',
                'password' => bcrypt('divisi123'),
                'id_divisi' => 3,
                'status' => 'offline',
                // Menggunakan bcrypt untuk mengenkripsi password
            ],
        ];

        // Masukkan data ke dalam tabel pengunjungs
        DB::table('users')->insert($data);
    }
}
