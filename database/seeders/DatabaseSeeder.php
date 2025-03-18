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
        //Usuario Admin
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@offersapp.com',
            'role' => 'admin',
        ]);

        //Usuario De Prueba
        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@offersapp.com',
            'role' => 'user',
        ]);

        // productos de prueba
        \App\Models\Offer::factory(10)->create();
    }
}
