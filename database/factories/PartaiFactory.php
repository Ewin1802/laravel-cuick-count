<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partai>
 */
class PartaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nm_partai' => $this->faker->randomElement(['PKB','GERINDRA','PDIP','GOLKAR', 'NASDEM', 'PARTAI BURUH', 'GELORA', 'PKS', 'PKN', 'HANURA','GARUDA','PAN','PBB', 'DEMOKRAT', 'PSI','PERINDO']),
            'no_partai' => $this->faker->randomDigit(),
        ];
    }
}
