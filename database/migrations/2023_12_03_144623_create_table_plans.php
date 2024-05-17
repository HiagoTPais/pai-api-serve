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
        Schema::create('planos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome')->nullable();
            $table->string('tipo')->nullable();
            $table->string('taxa_adesao')->nullable();
            $table->string('valor_plano_mes')->nullable();
            $table->string('duracao_contrato')->nullable();
            $table->string('taxa_rescisao')->nullable();
            $table->integer('n_min')->nullable();
            $table->integer('n_max')->nullable();
            $table->string('beneficiarios')->nullable();
            $table->string('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planos');
    }
};
