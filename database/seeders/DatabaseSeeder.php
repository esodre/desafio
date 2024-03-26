<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Client;
use App\Models\Establishment;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Category::factory(10)->create();
        Product::factory(20)->create();
        Establishment::factory(30)->create();
        Client::factory(10)->create();
        Order::factory(50)->create();
    }
}
