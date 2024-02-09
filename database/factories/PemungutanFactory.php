<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'paslon_id' => $this->faker->numberBetween(1, 10),
            'lokasi_id' => $this->faker->numberBetween(1, 10),
            'tps_1' => $this->faker->numberBetween(300, 700),
            'tps_2' => $this->faker->numberBetween(300, 700),
            'tps_3' => $this->faker->numberBetween(300, 700),
            'jlh_suara' => $this->faker->numberBetween(300, 700),
            'validateds' => $this->faker->randomElement(['ya', 'tidak']),

        ];
    }
}
