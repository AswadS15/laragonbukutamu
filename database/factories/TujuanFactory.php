<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pengunjung;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tujuan>
 */
class TujuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pengunjungDivisi = Pengunjung::pluck('id_divisi')->toArray();
        $idPengunjungs = Pengunjung::pluck('id')->toArray();

        return [
            'id_pengunjungs' => $this->faker->randomElement($idPengunjungs),
            'status' => 0,
            'tujuan' => $this->faker->sentence,
            'id_divisi' => $this->faker->randomElement($pengunjungDivisi),
        ];
    }
}
