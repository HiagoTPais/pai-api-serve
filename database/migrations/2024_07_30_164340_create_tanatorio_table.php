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
        Schema::create('tanatorio', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome_completo')->nullable(true);
            $table->string('idade')->nullable(true);
            $table->string('peso')->nullable(true);
            $table->string('altura')->nullable(true);
            $table->string('data_hora_obito')->nullable(true);
            $table->string('data_hora_atendimeto')->nullable(true);
            $table->string('local_obito')->nullable(true);
            $table->string('historico_pessoa')->nullable(true);
            $table->string('necropsiado')->nullable(true);
            $table->string('postura_corpo')->nullable(true);
            $table->string('sinais_decomposição')->nullable(true);
            $table->string('sinais_decomposição_local')->nullable(true);
            $table->string('sinais_decomposição_grau')->nullable(true);
            $table->string('rigidez')->nullable(true);
            $table->string('rigidez_grau')->nullable(true);
            $table->string('odor')->nullable(true);
            $table->string('odor_grau')->nullable(true);
            $table->string('olhos')->nullable(true);
            $table->string('boca')->nullable(true);
            $table->string('ouvido')->nullable(true);
            $table->string('toracoabdominal')->nullable(true);
            $table->string('regioes_extras')->nullable(true);
            $table->string('patologica')->nullable(true);
            $table->string('acidental')->nullable(true);
            $table->string('intensa')->nullable(true);
            $table->string('natural')->nullable(true);
            $table->string('intoxicação')->nullable(true);
            $table->string('patologica_outros')->nullable(true);
            $table->string('acidental_outros')->nullable(true);
            $table->string('intensa_outros')->nullable(true);
            $table->string('natural_outros')->nullable(true);
            $table->string('intoxicação_outros')->nullable(true);
            $table->string('higienizacao_corporal')->nullable(true);
            $table->string('somatoconservação')->nullable(true);
            $table->string('tamponamento')->nullable(true);
            $table->string('fechamento_buco_maxilo')->nullable(true);
            $table->string('secagem_fechamento_ocular')->nullable(true);
            $table->string('reparação_corporal')->nullable(true);
            $table->string('reparação_facial')->nullable(true);
            $table->string('cabelo')->nullable(true);
            $table->string('barba')->nullable(true);
            $table->string('bigode')->nullable(true);
            $table->string('corte_unhas')->nullable(true);
            $table->string('limpeza_hidratação_facial')->nullable(true);
            $table->string('maquiagem')->nullable(true);
            $table->string('ornamentação')->nullable(true);
            $table->string('veu')->nullable(true);
            $table->string('veste')->nullable(true);
            $table->string('observacoes')->nullable(true);
            $table->string('hora_inicial_procedimento')->nullable(true);
            $table->string('hora_final_Procedimento')->nullable(true);
            $table->string('agente_funerario_responsavel')->nullable(true);
            $table->string('auxiliar_agente_funerario')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanatorio');
    }
};
