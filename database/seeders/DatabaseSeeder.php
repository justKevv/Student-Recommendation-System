<?php

namespace Database\Seeders;

use App\Models\Supervisors;
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
            'name' => 'Kevin Bramasta',
            'email' => '2341720233@student.polinema.ac.id',
            'role' => 'student',
            'password' => bcrypt('12345678'),
            'phone' => '081234567890',
        ]);

        User::factory()->create([
            'name' => 'Adevian Fairuz',
            'email' => '2836913122@supervisor.polinema.ac.id',
            'role' => 'supervisor',
            'password' => bcrypt('12345678'),
            'phone' => '081234567890',
        ]);

        Supervisors::factory()->create([
            'user_id' => User::where('role', 'supervisor')->first()->id,
            'nidn' => '1234567890123',
            'expertise_areas' => ['Web Development', 'Database Management', 'Software Engineering'],
            'research_interests' => ['Artificial Intelligence', 'Machine Learning', 'Data Mining'],
        ]);
    }
}
