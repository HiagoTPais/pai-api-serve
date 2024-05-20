<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class ContratosBeneficiarios extends Model
{
    use HasFactory, HasUuid;

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $table = "contrato_beneficiario";

    protected $fillable = [
        'nome_completo',
        'data_nascimento',
        'nacionalidade',
        'rg',
        'orgao_expedicao',
        'data_expedicao',
        'cpf',
        'estado_civil',
        'grau_escolaridade',
        'ocupacao',
        'religiao',
        'apelido',
        'rua',
        'numero',
        'bairro',
        'cep',
        'cidade',
        'uf',
        'complemento',
        'ponto_referencia',
        'zona',
        'whatsapp_1_num',
        'whatsapp_1',
        'whatsapp_2_num',
        'whatsapp_2',
        'selecione_plano',
        'n_pessoas',
        'plano_valor',
        'taxa_adesao',
        'usuario',
        'observacoes',
        'beneficios_adicionais',
        'portabilidade',
        'empresa',
        'nome_completo_dependente',
        'nascimento_dependente',
        'parentesco_dependente',
        'cpf_dependente',
        'whatsapp_dependente',
        'seguro_dependente',
        'extra',
        'telefone_dependente',
        'valor_base_plano',
        'periodo',
        'renovacao_automatica',
        'forma_pagamento',
        'data_vencimento',
        'adicionais_idade',
        'adicionais_pessoas',
        'adicionais_serviços',
        'adicionais_seguro',
        'contratado_valor_total',
        'contratado_desconto',
        'contratado_valor_final',
        'endereco_cobranca',
        'rua_cobranca',
        'n_cobranca',
        'bairro_cobranca',
        'cep_cobranca',
        'cidade_cobranca',
        'uf_cobranca',
        'complemento_cobranca',
        'zona_cobranca',
        'ponto_referencia',
        'beneficiario_id',
    ];

    // public function additionalBenefits(): HasMany
    // {
    //     return $this->hasMany(AdditionalBenefits::class);
    // }
}
