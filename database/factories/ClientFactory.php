<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'email' => fake()->email,
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
            'bonus' => 100,
        ];
    }
}
