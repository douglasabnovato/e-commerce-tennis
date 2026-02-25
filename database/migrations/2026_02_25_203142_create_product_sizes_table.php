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
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->id();

            // Relacionamento com produto principal
            $table->foreignId('product_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Variantes de tamanho e cor
            $table->integer('size');
            $table->string('color')->nullable();

            // Estoque específico da variante
            $table->integer('stock')->default(0);

            // SKU único para cada combinação
            $table->string('sku')->unique();

            $table->timestamps();

            // Evita duplicação de variantes iguais
            $table->unique(['product_id', 'size', 'color']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sizes');
    }
};
