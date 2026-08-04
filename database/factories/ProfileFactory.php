<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = \App\Models\Profile::class;

    public function definition(): array
    {
        return [
            'bio' => fake()->paragraph(),
            'skills' => implode(', ', fake()->words(4)),
            'resume_path' => null,
            'portfolio_image_path' => null,
        ];
    }
}
