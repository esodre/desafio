<?php

use App\Enums\CategoryType;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable();
            $table->timestamps();
        });

        Category::query()->create([
            'name' => 'Establishment',
            'type' => CategoryType::ESTABLISHMENT,
        ]);

        Category::query()->create([
            'name' => 'Product',
            'type' => CategoryType::PRODUCT,
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
