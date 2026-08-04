<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'role' => 'freelancer',
            'remember_token' => \Illuminate\Support\Str::random(10),
        ];
    }

    public function client(): static
    {
        return $this->state(fn () => ['role' => 'client']);
    }

    public function freelancer(): static
    {
        return $this->state(fn () => ['role' => 'freelancer']);
    }

    public function admin(): static
    {
        return $this->state(fn () => ['role' => 'admin']);
    }
}
