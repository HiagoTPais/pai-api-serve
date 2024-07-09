<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class ServicoFunerario extends Model
{
    use HasFactory, HasUuid;

    protected $table = "servico_funerario";

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'responsavel_beneficiario_id',
        'falecido_beneficiario_id',
        'havera_uso_salao_homenagem',
        'havera_assistencia_copa',
        'havera_homenagem',
        'salao_homenagem',
        'colaborador',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'complemento',
        'ponto_referencia',
        'zona',
        'horario_inicio',
        'era_muito_conhecido',
        'era_muito_religioso',
        'quantos_filhos',
        'oque_gostava_fazer',
        'como_sentia',
        'qual_licao_deixou',
        'como_voce_descrever',
        'anotacoes',
        'local',
        'jazigo',
        'quadra',
        'bloco',
        'data_hora_sepultamento',
        'deseja_placa_identificacao_tumular',
        'havera_foto_colorida',
        'messagem_para_placa',
    ];
}
