<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'User Agbo',
            'email' => 'user@gmail.com',
            'username' => 'User',
            'password'=> bcrypt('user1234'),
            'usertype'=> 'user',
        ]);

        User::factory()->create([
            'name' => 'Admin Agbo',
            'email' => 'admin@gmail.com',
            'username' => 'Admin',
            'password'=> bcrypt('admin1234'),
            'usertype'=> 'admin',
        ]);
    }
}
