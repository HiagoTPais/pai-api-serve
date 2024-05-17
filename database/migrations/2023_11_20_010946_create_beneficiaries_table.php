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
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('protocolo_id')->nullable();
            $table->string('nome_completo')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('sexo')->nullable();
            $table->string('rg')->nullable();
            $table->string('orgao_expedicao')->nullable();
            $table->date('data_expedicao')->nullable();
            $table->string('cpf')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('grau_escolaridade')->nullable();
            $table->string('ocupaçao')->nullable();
            $table->string('religiao')->nullable();
            $table->string('apelido')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('complemento')->nullable();
            $table->string('ponto_referência')->nullable();
            $table->string('zona')->nullable();
            $table->string('whatsapp_1_num')->nullable();
            $table->string('whatsapp_1')->nullable();
            $table->string('whatsapp_2_num')->nullable();
            $table->string('whatsapp_2')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
