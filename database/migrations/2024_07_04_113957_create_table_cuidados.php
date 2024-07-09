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

        Schema::create('cuidados_funerario', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('servico_funerario_id')->nullable(false);
            $table->string('nome_completo')->nullable(true);
            $table->string('causa_morte')->nullable(true);
            $table->string('peso')->nullable(true);
            $table->string('altura')->nullable(true);
            $table->string('agenda_funeraria')->nullable(true);
            $table->string('auxiliar_agencia_funeraria')->nullable(true);
            $table->string('hora_data_inicio')->nullable(true);
            $table->string('hora_data_termino')->nullable(true);
            $table->string('ocupacao')->nullable(true);
            $table->string('religiao')->nullable(true);
            $table->string('havera_somatoconservacao_avancada')->nullable(true);
            $table->string('corpo_necropsiado')->nullable(true);
            $table->string('tronco_braquiocefalico')->nullable(true);
            $table->string('aorta_abdominal')->nullable(true);
            $table->string('carotica_comum_esquerda')->nullable(true);
            $table->string('carotica_comum_direita')->nullable(true);
            $table->string('subclavia_esquerda')->nullable(true);
            $table->string('subclavia_direita')->nullable(true);
            $table->string('braquial_esquerda')->nullable(true);
            $table->string('braquial_direita')->nullable(true);
            $table->string('iliaca_comum_esquerda')->nullable(true);
            $table->string('iliaca_comum_direita')->nullable(true);
            $table->string('femoral_esquerda')->nullable(true);
            $table->string('femoral_direita')->nullable(true);
            $table->string('tanatofluido_arterial')->nullable(true);
            $table->string('representante')->nullable(true);
            $table->string('volume')->nullable(true);
            $table->string('injecoes')->nullable(true);
            $table->string('outros')->nullable(true);
            $table->string('aspiracao_toraco_abdominal')->nullable(true);
            $table->string('evisceracao_embalagem')->nullable(true);
            $table->string('tanatofluido_arterial_cavidades')->nullable(true);
            $table->string('representante_cavidades')->nullable(true);
            $table->string('volume_cavidades')->nullable(true);
            $table->string('injecoes_cavidades')->nullable(true);
            $table->string('outros_cavidades')->nullable(true);
            $table->string('injecao_fluido_intradermico')->nullable(true);
            $table->string('locais_injecao_fluido_intradermico')->nullable(true);
            $table->string('restauracao')->nullable(true);
            $table->string('locais_restauracao')->nullable(true);
            $table->string('cosmeticos')->nullable(true);
            $table->string('locais_cosmeticos')->nullable(true);
            $table->string('cosmeticos_utilizados')->nullable(true);
            $table->string('translado')->nullable(true);
            $table->string('km')->nullable(true);
            $table->string('local_final')->nullable(true);
            $table->string('para')->nullable(true);
            $table->string('velorio')->nullable(true);
            $table->dateTime('hora_dia_velorio')->nullable(true);
            $table->string('sepultamento')->nullable(true);
            $table->dateTime('hora_dia_sepultamento')->nullable(true);
            $table->string('observacao')->nullable(true);
            $table->timestamps();
        });

        Schema::table('cuidados_funerario', function (Blueprint $table) {
            $table->foreign('servico_funerario_id')->references('id')->on('servico_funerario')->onDelete('cascade');
        });
    
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuidados');
    }
};
