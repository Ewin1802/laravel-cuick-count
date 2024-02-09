<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lokasi>
 */
class LokasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nm_desa' => $this->faker->city(),
            'nm_kec' => $this->faker->randomElement(['Pinogaluman','Kaidipang','Bolangitang Barat','Bolangitang Timur', 'Bintauna', 'Sangkub']),
            'dapil' => $this->faker->randomElement(['DAPIL I','DAPIL II','DAPIL III']),
            'jlh_tps' =>  $this->faker->numberBetween(1,8),
            'jlh_pemilih' => $this->faker->numberBetween(600,1500),
        ];
    }
}
