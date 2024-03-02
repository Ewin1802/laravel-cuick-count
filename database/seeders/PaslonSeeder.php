<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaslonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Paslon::factory()
        ->count(2)
        ->create();

        \App\Models\Paslon::create([
            'nama_partai' => '17 - PPP',
            'nama_paslon' => 'M. Aditya Pontoh (MAP)',
            'no_urut' => '1',

        ]);

    }
}
