<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->words(asText: true),
            'parent_id' => Category::inRandomOrder()->first()?->id ?? 0,
        ];
    }
}
