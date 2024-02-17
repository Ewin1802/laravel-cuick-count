<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paslon>
 */
class PaslonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_partai' => $this->faker->randomElement(['1 - PKB','2 - GERINDRA','3 - PDIP','4 - GOLKAR', '5 - NASDEM', '6 - PARTAI BURUH', '7 - GELORA','8 - PKS','9 - PKN','10 - HANURA','11 - GARUDA','12 - PAN','13 - PBB','14 - DEMOKRAT','15 - PSI','16 - PERINDO','17 - PPP']),
            'nama_paslon' => $this->faker->name(),

            'no_urut' => $this->faker->numberBetween(1, 15),
        ];
    }
}
