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
        \App\Models\User::factory()->count(50)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Fabian Admin',
        //     'email' => 'fabian@example.com',
        //     'password' => 'fabian@example.com',
        //     'admin' => true,
        // ]);
    }
}
