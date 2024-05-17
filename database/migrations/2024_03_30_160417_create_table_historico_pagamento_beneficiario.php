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
        Schema::create('pagamento_beneficiario', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('beneficiario_id')->nullable(false);
            $table->string('indentificacao')->nullable();
            $table->string('nome')->nullable();
            $table->string('tipo')->nullable();
            $table->string('vencimento')->nullable();
            $table->string('valor')->nullable();
            $table->string('pagamento')->nullable();
            $table->string('segunda_via')->nullable();
            $table->string('cobrador')->nullable();
            $table->timestamps();
        });

        Schema::table('pagamento_beneficiario', function (Blueprint $table) {
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamento_beneficiario');
    }
};
