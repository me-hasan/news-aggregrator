<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345')
        ]);

        \App\Models\UserPreference::create([
            'user_id' => 1,
            'category' => 'general',
            'language' => 'es',
            'country' => 'es',
            'author' => 'es'
        ]);
    }
}
