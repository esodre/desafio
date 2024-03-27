<?php

namespace Database\Factories;

use App\Enums\CategoryType;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->words(asText: true),
            'type' => Category::inRandomOrder()->first()?->type ?? CategoryType::PRODUCT,
        ];
    }
}
