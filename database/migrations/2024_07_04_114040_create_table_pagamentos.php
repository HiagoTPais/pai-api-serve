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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::create('pagamentos_funerario', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('servico_funerario_id')->nullable(false);
            $table->boolean('parcelamento')->nullable(true);
            $table->string('forma_pagamento')->nullable(true);
            $table->string('bandeira_cartao')->nullable(true);
            $table->integer('n_parcelas')->nullable(true);
            $table->decimal('valor_parcelas')->nullable(true);
            $table->timestamps();
        });

        Schema::table('pagamentos_funerario', function (Blueprint $table) {
            $table->foreign('servico_funerario_id')->references('id')->on('servico_funerario')->onDelete('cascade');
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_pagamentos');
    }
};
