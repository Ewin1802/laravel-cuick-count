<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paslon;
use App\Models\Lokasi;
use App\Models\Sonuo;
use App\Models\Jambusarang;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemungutan>
 */
class PemungutanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            // 'nm_paslon' => $this->faker->name(),
            // 'nm_lokasi' => $this->faker->name(),
            'nm_paslon' => $this->faker->randomElement(Paslon::all())['nama_paslon'],
            'lokasi_id' => $this->faker->randomElement(Lokasi::all())['id'],
            'nm_dapil' => Sonuo::pluck('dapil'),

            'suara' => $this->faker->numberBetween(300, 700),
            'validateds' => $this->faker->randomElement(['ya', 'tidak']),

        ];
    }
}
