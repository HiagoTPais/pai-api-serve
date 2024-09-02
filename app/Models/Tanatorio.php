<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class Tanatorio extends Model
{
    use HasFactory, HasUuid;

    protected $primaryKey = 'id';
    
    protected $table = 'tanatorio';

    public $incrementing = false;

    protected $fillable = [
        'nome_completo',
        'idade',
        'peso',
        'altura',
        'data_hora_obito',
        'data_hora_atendimeto',
        'local_obito',
        'historico_pessoa',
        'necropsiado',
        'postura_corpo',
        'sinais_decomposicao',
        'sinais_decomposicao_local',
        'sinais_decomposicao_grau',
        'rigidez',
        'rigidez_grau',
        'odor',
        'odor_grau',
        'olhos',
        'boca',
        'ouvido',
        'toracoabdominal',
        'regioes_extras',
        'patologica',
        'acidental',
        'intensa',
        'natural',
        'intoxicacao',
        'patologica_outros',
        'acidental_outros',
        'intensa_outros',
        'natural_outros',
        'intoxicacao_outros',
        'higienizacao_corporal',
        'somatoconservacao',
        'tamponamento',
        'fechamento_buco_maxilo',
        'secagem_fechamento_ocular',
        'reparacao_corporal',
        'reparacao_facial',
        'cabelo',
        'barba',
        'bigode',
        'corte_unhas',
        'limpeza_hidratacao_facial',
        'maquiagem',
        'ornamentacao',
        'veu',
        'veste',
        'tronco_braquiocefalico',
        'aorta_abdominal',
        'carotida',
        'subclavia',
        'braquial',
        'iliaca_comum',
        'femoral',
        'aspiracao_torax_abdomen',
        'embrulho_visceras',
        'pre_injecao_fluido_solvente_descoagulante',
        'injecao_hipodermico_areas_obstruidas',
        'fluido_arterial',
        'volume_arterial',
        'n_aplicacoes_arterial',
        'marca_produto_arterial',
        'fluido_cavidade',
        'volume_cavidade',
        'n_aplicacoes_cavidade',
        'marca_produto_cavidade',
        'fluido_injecao',
        'volume_injecao',
        'n_aplicacoes_injecao',
        'marca_produto_injecao',
        'observacoes',
        'hora_inicial_procedimento',
        'hora_final_Procedimento',
        'agente_funerario_responsavel',
        'auxiliar_agente_funerario',
        'tanatorio',
        'outras_regioes'
    ];
}


