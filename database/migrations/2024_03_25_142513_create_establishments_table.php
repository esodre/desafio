<?php

use App\Models\Category;
use Faker\Provider\Address;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignIdFor(Category::class);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('establishments');
    }
};
