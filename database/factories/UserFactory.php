<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'role' => fake()->randomElement(['admin', 'student','supervisor']),
            'phone' => fake()->phoneNumber(),
            'profile_picture' => 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/user/blank-profile-picture-973460_1920.png',
            'password' => static::$password ??= Hash::make('password'),
        ];
    }
}
