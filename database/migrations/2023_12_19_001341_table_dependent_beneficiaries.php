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
        Schema::create('beneficiarios_dependentes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('beneficiario_id')->nullable(false);
            $table->uuid('contrato_id')->nullable(false);
            $table->string('nome_completo_dependente')->nullable();
            $table->string('nascimento_dependente')->nullable();
            $table->string('parentesco_dependente')->nullable();
            $table->string('cpf_dependente')->nullable();
            $table->string('whatsapp_dependente')->nullable();
            $table->string('seguro_dependente')->nullable();
            $table->string('extra')->nullable();
            $table->string('telefone_dependente')->nullable();
            $table->timestamps();
        });

        Schema::table('beneficiarios_dependentes', function (Blueprint $table) {
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
        });

        Schema::table('beneficiarios_dependentes', function (Blueprint $table) {
            $table->foreign('contrato_id')->references('id')->on('contrato_beneficiario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
