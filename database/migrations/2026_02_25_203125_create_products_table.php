<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('brand')->index();
            $table->string('category')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->string('material')->nullable();
            $table->integer('weight')->nullable();
            $table->string('technology')->nullable();
            $table->string('usage_type')->nullable();
            $table->year('release_year')->nullable();
            $table->string('sku')->unique();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('history')->nullable();
            $table->integer('nba_minutes_played')->nullable();
            $table->timestamps();

            $table->index('name');
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
