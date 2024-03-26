<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Establishment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstablishmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'description' => fake()->sentence(),
            'category_id' => Category::factory(),
            'product_id' => Product::factory(),
        ];
    }
}
