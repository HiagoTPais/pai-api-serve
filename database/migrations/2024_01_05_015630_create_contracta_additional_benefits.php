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
        Schema::create('beneficios_adicionais', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('plano_id')->nullable(false);
            $table->decimal('valor');
            $table->string('beneficio_adicional');
            $table->timestamps();
        });

        Schema::table('beneficios_adicionais', function (Blueprint $table) {
            $table->foreign('plano_id')->references('id')->on('planos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficios_adicionais');
    }
};
