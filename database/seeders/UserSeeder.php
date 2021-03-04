<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {

        User::factory()->create([
            'email' => 'admin@admin.com',
        ]);

        User::factory()->create([
            'email' => 'admin1@admin.com',
        ]);
    }
}
