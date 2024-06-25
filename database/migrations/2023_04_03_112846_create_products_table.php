<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Season;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->text('description');
            $table->foreignIdFor(Brand::class, 'brand_id');
            $table->foreignIdFor(Category::class, 'category_id');
            $table->foreignIdFor(Gender::class, 'gender_id');
            $table->foreignIdFor(Season::class, 'season_id');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
