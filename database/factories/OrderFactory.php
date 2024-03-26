<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Establishment;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'establishment_id' => Establishment::factory(),
            'total' => '100'
        ];
    }
}
