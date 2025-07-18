<?php

namespace Database\Seeders;

use App\Models\Ruangrawat;
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
            $this->call([
        FaqSeeder::class,
        LayananSeeder::class,
        RawatJalanSeeder::class,
        RuangrawatSeeder::class,
        RapidswabSeeder::class,
        // Add all other seeders you want here
    ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
