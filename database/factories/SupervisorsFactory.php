<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supervisors>
 */
class SupervisorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'nidn' => $this->faker->numerify('###########'),
            'expertise_areas' => json_encode(['Web Development', 'Database Management', 'Software Engineering']),
            'research_interests' => json_encode(['Artificial Intelligence', 'Machine Learning', 'Data Mining', 'Computer Vision']),
        ];
    }
}
