<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {

        User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => Hash::make(']\d3bN}S6~rpZ4gJ')
        ]);

        User::factory()->create([
            'email' => 'admin1@admin.com',
            'password' => Hash::make(']\d3bN}S6~rpZ4gJ')
        ]);
    }
}
