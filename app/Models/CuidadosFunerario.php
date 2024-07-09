<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class CuidadosFunerario extends Model
{
    use HasFactory, HasUuid;

    protected $table = "cuidados_funerario";

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'servico_funerario_id',
        'nome_completo',
        'causa_morte',
        'peso',
        'altura',
        'agenda_funeraria',
        'auxiliar_agencia_funeraria',
        'hora_data_inicio',
        'hora_data_termino',
        'ocupacao',
        'religiao',
        'havera_somatoconservacao_avancada',
        'corpo_necropsiado',
        'tronco_braquiocefalico',
        'aorta_abdominal',
        'carotica_comum_esquerda',
        'carotica_comum_direita',
        'subclavia_esquerda',
        'subclavia_direita',
        'braquial_esquerda',
        'braquial_direita',
        'iliaca_comum_esquerda',
        'iliaca_comum_direita',
        'femoral_esquerda',
        'femoral_direita',
        'tanatofluido_arterial',
        'representante',
        'volume',
        'injecoes',
        'outros',
        'aspiracao_toraco_abdominal',
        'evisceracao_embalagem',
        'tanatofluido_arterial_cavidades',
        'representante_cavidades',
        'volume_cavidades',
        'injecoes_cavidades',
        'outros_cavidades',
        'injecao_fluido_intradermico',
        'locais_injecao_fluido_intradermico',
        'restauracao',
        'locais_restauracao',
        'cosmeticos',
        'locais_cosmeticos',
        'cosmeticos_utilizados',
        'translado',
        'km',
        'local_final',
        'para',
        'velorio',
        'hora_dia_velorio',
        'sepultamento',
        'hora_dia_sepultamento',
        'observacao',
    ];
}
