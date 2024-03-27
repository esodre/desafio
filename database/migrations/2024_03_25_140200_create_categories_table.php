<?php

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
            $table->integer('parent_id')->nullable();
            $table->timestamps();
        });

        Category::query()->create([
            'name' => 'Establishment',
            'parent_id' => 0,
        ]);

        Category::query()->create([
            'name' => 'Product',
            'parent_id' => 0,
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
