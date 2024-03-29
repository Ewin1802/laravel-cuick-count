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
        ->count(10)
        ->create();

        // \App\Models\User::create([
        //     'name' => 'Admin Ewin',
        //     'email' => 'ewin@fic10.com',
        //     'password' => Hash::make('12345678'),
        //     'roles' => 'ADMIN',
        //     'phone' => '081340985993',
        // ]);
    }
}
