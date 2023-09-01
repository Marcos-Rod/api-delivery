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
            'name' => 'Marcos',
            'email' => 'tmlwar01@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'client',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Marcos Delivery',
            'email' => 'delivery@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'delivery',
            'config' => [
                'availability' => false,
            ]
        ]);

        $this->call(EstablishmentSeeder::class);
    }
}
