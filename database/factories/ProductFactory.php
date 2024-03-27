<?php

namespace Database\Factories;

use App\Enums\CategoryType;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'category_id' => Category::inRandomOrder()->where('type', CategoryType::PRODUCT)->first()->id,
            'description' => fake()->text(),
            'price' => rand(1, 100)
        ];
    }
}
