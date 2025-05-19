<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'admin123',
            'role' => 'admin'
        ]);

        // Create regular users
        User::factory(5)->create()->each(function ($user) {
            // Create posts for each user
          ;
        });
    }
}
