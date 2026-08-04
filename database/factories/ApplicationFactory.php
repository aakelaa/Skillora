<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    protected $model = \App\Models\Application::class;

    public function definition(): array
    {
        return [
            'job_id' => Job::inRandomOrder()->value('id'),
            'freelancer_id' => User::where('role', 'freelancer')->inRandomOrder()->value('id'),
            'cover_letter' => fake()->paragraph(),
            'status' => fake()->randomElement(['pending', 'pending', 'hired', 'rejected']),
        ];
    }
}
