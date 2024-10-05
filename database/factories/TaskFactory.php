<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'       => fake()->sentence, 
            'description' => fake()->paragraph,
            'status'      => fake()->randomElement(['To Do', 'In Progress', 'Done']),
            'due_date'    => fake()->dateTimeBetween('2024-10-10', '2024-10-30'),
            'created_by'  => User::all()->random()->id,
        ];
    }
}
