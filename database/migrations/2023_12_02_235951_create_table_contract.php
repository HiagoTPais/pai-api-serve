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
        Schema::create('contrato_beneficiario', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('beneficiario_id')->nullable(false);
            $table->string('selecione_plano')->nullable();
            $table->integer('n_pessoas')->nullable();
            $table->string('plano_valor')->nullable();
            $table->string('taxa_adesao')->nullable();
            $table->string('usuario')->nullable();
            $table->string('observacoes')->nullable();
            $table->string('portabilidade')->nullable();
            $table->string('empresa')->nullable();
            $table->string('telefone_dependente')->nullable();
            $table->string('valor_base_plano')->nullable();
            $table->string('periodo')->nullable();
            $table->string('renovacao_automatica')->nullable();
            $table->string('forma_pagamento')->nullable();
            $table->date('data_vencimento')->nullable();
            $table->string('adicionais_idade')->nullable();
            $table->string('adicionais_pessoas')->nullable();
            $table->string('adicionais_serviços')->nullable();
            $table->string('adicionais_seguro')->nullable();
            $table->string('contratado_valor_total')->nullable();
            $table->string('contratado_desconto')->nullable();
            $table->string('contratado_valor_final')->nullable();
            $table->string('endereco_cobranca')->nullable();
            $table->string('rua_cobranca')->nullable();
            $table->string('n_cobranca')->nullable();
            $table->string('bairro_cobranca')->nullable();
            $table->string('cep_cobranca')->nullable();
            $table->string('cidade_cobranca')->nullable();
            $table->string('uf_cobranca')->nullable();
            $table->string('complemento_cobranca')->nullable();
            $table->string('zona_cobranca')->nullable();
            $table->string('ponto_referencia')->nullable();
            $table->timestamps();
        });

        Schema::table('contrato_beneficiario', function (Blueprint $table) {
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrato_beneficiario');
    }
};
