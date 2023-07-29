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

        // * For now, line 17 creates the users and the department
        \App\Models\Department::factory(10)->create();

        \App\Models\Department::factory()->create(['manager_id' => \App\Models\User::factory()->create([
            'name' => 'JorianB',
            'email' => 'jorianb@intranetv2.nl',
            'isAdmin' => 1,
        ])]);
    }
}
