<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Psa>
 */
class PsaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'department_id' => \App\Models\Department::factory(),
            'title' => fake()->word(),
            'content' => fake()->paragraphs(4, true)
        ];
    }
}
