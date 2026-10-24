<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'maroj@example.com'],
            ['name' => 'Maroj Reyes', 'password' => Hash::make('Password123!')]
        );

        User::firstOrCreate(
            ['email' => 'harvey@example.com'],
            ['name' => 'Harvey Javier', 'password' => Hash::make('Password123!')]
        );
    }
}
