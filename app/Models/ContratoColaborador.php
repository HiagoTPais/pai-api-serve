<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class ContratoColaborador extends Model
{
    use HasFactory, HasUuid;

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $table = "contrato_colaborador";

    protected $fillable = [
        'cbo',
        'funcao',
        'cpf_cnpj',
        'cargo',
        'carga_horaria',
        'data_pagamento',
        'salario_base',
        'salario_familia',
        'periculosidade',
        'insalubridade',
        'adicional_noturno',
        'auxilio_transporte',
        'auxilio_alimentacao',
        'auxilio_moradia',
        'comissao',
        'remuneracao',
        'contrato_anexo',
        'setor_departamento',
        'cnae',
        'colaborador_id'
    ];
}
