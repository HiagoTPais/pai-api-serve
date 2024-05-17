<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class DependentBeneficiaries extends Model
{
    use HasFactory, HasUuid;

    protected $table = "beneficiarios_dependentes";

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'beneficiario_id',
        'contrato_id',
        'nome_completo_dependente',
        'nascimento_dependente',
        'parentesco_dependente',
        'cpf_dependente',
        'whatsapp_dependente',
        'seguro_dependente',
        'extra',
        'telefone_dependente',
    ];
}
