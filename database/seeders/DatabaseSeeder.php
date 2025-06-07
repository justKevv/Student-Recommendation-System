<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin1@admin.polinema.ac.id',
            'role' =>'admin',
            'password' => bcrypt('12345678'),
            'phone' => '081234567890',
        ]);

        Admin::factory()->create([
            'user_id' => 1,
            'employee_id' => 1,
        ]);

        // User::factory(20)->create();
    }
}
