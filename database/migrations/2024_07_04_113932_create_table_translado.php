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

        Schema::create('translado', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('servico_funerario_id')->nullable(false);
            $table->boolean('havera_translado')->nullable(true);
            $table->string('cep_partida')->nullable(true);
            $table->string('rua_partida')->nullable(true);
            $table->string('numero_partida')->nullable(true);
            $table->string('bairro_partida')->nullable(true);
            $table->string('cidade_partida')->nullable(true);
            $table->string('uf_partida')->nullable(true);
            $table->string('complemento_partida')->nullable(true);
            $table->string('ponto_referencia_partida')->nullable(true);
            $table->string('zona_partida')->nullable(true);
            $table->string('cep_destino')->nullable(true);
            $table->string('rua_destino')->nullable(true);
            $table->string('numero_destino')->nullable(true);
            $table->string('bairro_destino')->nullable(true);
            $table->string('cidade_destino')->nullable(true);
            $table->string('uf_destino')->nullable(true);
            $table->string('complemento_destino')->nullable(true);
            $table->string('ponto_referencia_destino')->nullable(true);
            $table->string('zona_destino')->nullable(true);            
            $table->timestamps();
        });

        Schema::table('translado', function (Blueprint $table) {
            $table->foreign('servico_funerario_id')->references('id')->on('servico_funerario')->onDelete('cascade');
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_translado');
    }
};
