<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = \App\Models\Job::class;

    public function definition(): array
    {
        return [
            'client_id' => User::factory()->client(),
            'category_id' => Category::inRandomOrder()->value('id'),
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraphs(3, true),
            'budget' => fake()->numberBetween(50, 5000),
            'deadline' => fake()->dateTimeBetween('now', '+2 months'),
            'status' => fake()->randomElement(['open', 'open', 'open', 'closed']),
        ];
    }
}
