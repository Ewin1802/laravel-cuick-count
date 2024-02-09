<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Lokasi::factory(20)->create();

        \App\Models\Lokasi::factory()
        ->count(10)
        ->create();
    }
}
