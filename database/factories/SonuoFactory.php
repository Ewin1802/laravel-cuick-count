<?php

namespace Database\Factories;

use App\Models\Paslon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sonuo>
 */
class SonuoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nm_caleg' => $this->faker->randomElement(Paslon::all())['nama_paslon'],
            'dapil' => 'DAPIL II',
            'desa'  => 'Sonuo',
            'tps_1' => $this->faker->numberBetween(300, 700),
            'tps_2' => $this->faker->numberBetween(300, 700),
            'tps_3' => $this->faker->numberBetween(300, 700),
            'tps_4' => $this->faker->numberBetween(300, 700),
            'tps_5' => $this->faker->numberBetween(300, 700),
            'tps_6' => $this->faker->numberBetween(300, 700),
            'tps_7' => $this->faker->numberBetween(300, 700),
            'tps_8' => $this->faker->numberBetween(300, 700),
            'tps_9' => $this->faker->numberBetween(300, 700),
            'tps_10' => $this->faker->numberBetween(300, 700),
            'tps_11' => $this->faker->numberBetween(300, 700),
            'tps_12' => $this->faker->numberBetween(300, 700),
            'jlh_suara' => $this->faker->numberBetween(300, 700),
            'validateds' => $this->faker->randomElement(['ya', 'tidak']),
        ];
    }
}
