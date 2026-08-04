<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = \App\Models\Category::class;

    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Web Development', 'Mobile Apps', 'Graphic Design', 'Writing & Translation',
            'Digital Marketing', 'Video Editing', 'Data Entry', 'UI/UX Design',
        ]);

        return [
            'name' => $name,

        ];
    }
}
