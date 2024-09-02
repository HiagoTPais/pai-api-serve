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
            $table->string('sinais_decomposicao')->nullable(true);
            $table->string('sinais_decomposicao_local')->nullable(true);
            $table->string('sinais_decomposicao_grau')->nullable(true);
            $table->string('rigidez')->nullable(true);
            $table->string('rigidez_grau')->nullable(true);
            $table->string('odor')->nullable(true);
            $table->string('odor_grau')->nullable(true);
            $table->string('olhos')->nullable(true);
            $table->string('boca')->nullable(true);
            $table->string('ouvido')->nullable(true);
            $table->string('toracoabdominal')->nullable(true);

            $table->string('imagem_decomposicao')->nullable(true);
            $table->string('imagem_rigidez')->nullable(true);
            $table->string('imagem_odor')->nullable(true);
            $table->string('imagem_olhos')->nullable(true);
            $table->string('imagem_boca')->nullable(true);
            $table->string('imagem_ouvido')->nullable(true);
            $table->string('imagem_toracoabdominal')->nullable(true);

            $table->string('regioes_extras')->nullable(true);
            $table->string('patologica')->nullable(true);
            $table->string('acidental')->nullable(true);
            $table->string('intensa')->nullable(true);
            $table->string('natural')->nullable(true);
            $table->string('intoxicacao')->nullable(true);
            $table->string('patologica_outros')->nullable(true);
            $table->string('acidental_outros')->nullable(true);
            $table->string('intensa_outros')->nullable(true);
            $table->string('natural_outros')->nullable(true);
            $table->string('intoxicacao_outros')->nullable(true);
            $table->string('higienizacao_corporal')->nullable(true);
            $table->string('somatoconservacao')->nullable(true);
            $table->string('tamponamento')->nullable(true);
            $table->string('fechamento_buco_maxilo')->nullable(true);
            $table->string('secagem_fechamento_ocular')->nullable(true);
            $table->string('reparacao_corporal')->nullable(true);
            $table->string('reparacao_facial')->nullable(true);
            $table->string('cabelo')->nullable(true);
            $table->string('barba')->nullable(true);
            $table->string('bigode')->nullable(true);
            $table->string('corte_unhas')->nullable(true);
            $table->string('limpeza_hidratacao_facial')->nullable(true);
            $table->string('maquiagem')->nullable(true);
            $table->string('ornamentacao')->nullable(true);
            $table->string('veu')->nullable(true);
            $table->string('veste')->nullable(true);

            $table->string('tronco_braquiocefalico')->nullable(true);
            $table->string('aorta_abdominal')->nullable(true);
            $table->string('carotida')->nullable(true);
            $table->string('subclavia')->nullable(true);
            $table->string('braquial')->nullable(true);
            $table->string('iliaca_comum')->nullable(true);
            $table->string('femoral')->nullable(true);
            $table->string('aspiracao_torax_abdomen')->nullable(true);
            $table->string('embrulho_visceras')->nullable(true);
            $table->string('pre_injecao_fluido_solvente_descoagulante')->nullable(true);
            $table->string('injecao_hipodermico_areas_obstruidas')->nullable(true);
            $table->string('fluido_arterial')->nullable(true);
            $table->string('volume_arterial')->nullable(true);
            $table->integer('n_aplicacoes_arterial')->nullable(true);
            $table->string('marca_produto_arterial')->nullable(true);
            $table->string('fluido_cavidade')->nullable(true);
            $table->string('volume_cavidade')->nullable(true);
            $table->integer('n_aplicacoes_cavidade')->nullable(true);
            $table->string('marca_produto_cavidade')->nullable(true);
            $table->string('fluido_injecao')->nullable(true);
            $table->string('volume_injecao')->nullable(true);
            $table->integer('n_aplicacoes_injecao')->nullable(true);
            $table->string('marca_produto_injecao')->nullable(true);

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
