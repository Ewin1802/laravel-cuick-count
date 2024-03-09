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
        // \App\Models\Paslon::factory()
        // ->count(2)
        // ->create();

        \App\Models\Paslon::create([
            'nama_partai' => '17 - PPP',
            'nama_paslon' => 'M. Aditya Pontoh (MAP)',
            'no_urut' => '1',
        ]);

        \App\Models\Paslon::create([
            'nama_partai' => '4 - GOLKAR',
            'nama_paslon' => 'Vladimir Putin',
            'no_urut' => '2',
        ]);
        \App\Models\Paslon::create([
            'nama_partai' => '8 - PKS',
            'nama_paslon' => 'Donald Trump',
            'no_urut' => '3',
        ]);

    }
}
