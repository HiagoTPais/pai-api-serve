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
        Schema::create('historico_beneficiario', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('beneficiario_id')->nullable(false);
            $table->string('protocolo')->nullable();
            $table->integer('numero')->nullable();
            $table->date('date')->nullable();
            $table->string('servico')->nullable();
            $table->decimal('valor')->nullable();
            $table->date('vencimento')->nullable();
            $table->string('pagamento')->nullable();
            $table->string('atendente')->nullable();
            $table->string('segunda_via')->nullable();
            $table->string('cobrador')->nullable();
            $table->string('avaliacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_beneficiario');
    }
};
