<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(2)->create();

        \App\Models\User::create([
            'name' => 'Admin Ewin',
            'email' => 'ewin@fic10.com',
            'password' => Hash::make('11111111'),
            'roles' => 'ADMIN',
            'phone' => '081340985993',
        ]);

        \App\Models\User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@test.com',
            'password' => Hash::make('33333333'),
            'roles' => 'STAFF',
            'phone' => '081340985993',
        ]);
    }
}
