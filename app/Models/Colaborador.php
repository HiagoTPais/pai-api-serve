<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class Colaborador extends Model
{
    use HasFactory, HasUuid;

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $table = "colaborador";

    protected $fillable = [
        'user_id',
        'nome_completo',
        'data_nascimento',
        'nacionalidade',
        'rg',
        'sexo',
        'orgao_expedicao',
        'data_expedicao',
        'cpf',
        'estado_civil',
        'grau_escolaridade',
        'ocupacao',
        'religiao',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'complemento',
        'ponto_referencia',
        'zona',
        'whatsapp_1_num',
        'whatsapp_1',
        'whatsapp_2_num',
        'whatsapp_2',
        'forma_contratacao',
        'tipo_ontratacao',
        'entidade_pessoa',
        'cpf_cnpj',
        'ctps',
        'pis',
        'titulo_eleitor',
        'reservista'
    ];
}
