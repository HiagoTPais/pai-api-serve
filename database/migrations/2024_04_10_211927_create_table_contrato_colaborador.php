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
        Schema::create('contrato_colaborador', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('colaborador_id')->nullable(false);
            $table->string('ferias')->nullable();
            $table->string('cpf_cnpj')->nullable();
            $table->string('cbo')->nullable();
            $table->string('funcao')->nullable();
            $table->string('cargo')->nullable();
            $table->string('carga_horaria')->nullable();
            $table->string('data_pagamento')->nullable();
            $table->string('salario_base')->nullable();
            $table->string('salario_familia')->nullable();
            $table->string('periculosidade')->nullable();
            $table->string('insalubridade')->nullable();
            $table->string('adicional_noturno')->nullable();
            $table->string('auxilio_transporte')->nullable();
            $table->string('auxilio_alimentacao')->nullable();
            $table->string('auxilio_moradia')->nullable();
            $table->string('comissao')->nullable();
            $table->string('remuneracao')->nullable();
            $table->string('contrato_anexo')->nullable();
            $table->string('setor_departamento')->nullable();
            $table->string('cnae')->nullable();
            $table->timestamps();
        });

        Schema::table('contrato_colaborador', function (Blueprint $table) {
            $table->foreign('colaborador_id')->references('id')->on('colaborador')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrato_colaborador');
    }
};
