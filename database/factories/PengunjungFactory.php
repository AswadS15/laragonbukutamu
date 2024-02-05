<?php

namespace Database\Factories;

use App\Models\Pengunjung;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class PengunjungFactory extends Factory
{
    protected $model = Pengunjung::class;

    public function definition()
    {

        return [
            'id_divisi' => $this->faker->numberBetween(1, 3),
            'nama' => $this->faker->name,
            'email' => $this->faker->unique()->username . '@gmail.com',
            'instansi' => $this->faker->company,
            'alamat' => $this->faker->address,
            'hp' => '08' . $this->faker->randomNumber(8, true) . $this->faker->randomNumber(2, false),
        ];
    }
}
