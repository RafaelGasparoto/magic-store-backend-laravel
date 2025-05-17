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
        Schema::create('item_carrinhos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('carrinho_id')->constrained('carrinhos');
            $table->foreignId('carta_id')->constrained('cartas');
            $table->integer('quantidade');
            $table->float('preco');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_carrinhos');
    }
};
