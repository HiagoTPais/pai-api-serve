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
        Schema::create('colaborador', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable(false);
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
            $table->string('ocupacao')->nullable();
            $table->string('religiao')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('complemento')->nullable();
            $table->string('ponto_referencia')->nullable();
            $table->string('zona')->nullable();
            $table->string('whatsapp_1_num')->nullable();
            $table->string('whatsapp_1')->nullable();
            $table->string('whatsapp_2_num')->nullable();
            $table->string('whatsapp_2')->nullable();
            $table->string('forma_contratacao')->nullable();
            $table->string('tipo_ontratacao')->nullable();
            $table->string('entidade_pessoa')->nullable();
            $table->string('cpf_cnpj')->nullable();
            $table->string('ctps')->nullable();
            $table->string('pis')->nullable();
            $table->string('titulo_eleitor')->nullable();
            $table->string('reservista')->nullable();
            $table->timestamps();
        });

        Schema::table('colaborador', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborador');
    }
};
