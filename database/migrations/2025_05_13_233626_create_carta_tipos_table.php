<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carta_tipos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
        });

        $tipos = [
            'Criatura',
            'Feitiço',
            'Artefato',
            'Encantamento',
            'Batalha',
            'Planeswalker',
        ];

        foreach ($tipos as $tipo) {
            DB::table('carta_tipos')->insert(['nome' => $tipo, 'created_at' => now()]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carta_tipos');
    }
};
