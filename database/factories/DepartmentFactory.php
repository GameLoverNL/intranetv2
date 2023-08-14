<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'members' => 0,
            'applications' => fake()->boolean(),
            'manager_id' => \App\Models\User::factory()
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (\App\Models\Department $department) {
            $user = \App\Models\User::find($department->manager_id);
            $user->department_id = $department->id;
            $department->members++;
            return $user->save();
        });
    }

}
