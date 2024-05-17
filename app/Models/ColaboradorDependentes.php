<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class ColaboradorDependentes extends Model
{
    use HasFactory, HasUuid; 

    protected $table = "colaborador_dependentes";

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'colaborador_id',
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
