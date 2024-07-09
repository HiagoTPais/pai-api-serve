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

        Schema::create('servico_funerario', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('responsavel_beneficiario_id')->nullable(false);
            $table->uuid('falecido_beneficiario_id')->nullable(true);
            $table->boolean('havera_uso_salao_homenagem')->nullable(true);
            $table->boolean('havera_assistencia_copa')->nullable(true);
            $table->boolean('havera_homenagem')->nullable(true);
            $table->string('salao_homenagem')->nullable(true);
            $table->string('colaborador')->nullable(true);
            $table->string('cep')->nullable(true);
            $table->string('rua')->nullable(true);
            $table->string('numero')->nullable(true);
            $table->string('bairro')->nullable(true);
            $table->string('cidade')->nullable(true);
            $table->string('uf')->nullable(true);
            $table->string('complemento')->nullable(true);
            $table->string('ponto_referencia')->nullable(true);
            $table->string('zona')->nullable(true);
            $table->string('horario_inicio')->nullable(true);
            $table->string('era_muito_conhecido')->nullable(true);
            $table->string('era_muito_religioso')->nullable(true);
            $table->integer('quantos_filhos')->nullable(true);
            $table->string('oque_gostava_fazer')->nullable(true);
            $table->string('como_sentia')->nullable(true);
            $table->string('qual_licao_deixou')->nullable(true);
            $table->string('como_voce_descrever')->nullable(true);
            $table->string('anotacoes')->nullable(true);
            $table->string('local')->nullable(true);
            $table->string('jazigo')->nullable(true);
            $table->string('quadra')->nullable(true);
            $table->string('bloco')->nullable(true);
            $table->dateTime('data_hora_sepultamento')->nullable(true);
            $table->boolean('deseja_placa_identificacao_tumular')->nullable(true);
            $table->boolean('havera_foto_colorida')->nullable(true);
            $table->string('messagem_para_placa')->nullable(true);
            $table->timestamps();
        });

        Schema::table('servico_funerario', function (Blueprint $table) {
            $table->foreign('responsavel_beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servico_funerario');
    }
};
