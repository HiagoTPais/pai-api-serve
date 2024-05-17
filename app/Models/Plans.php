<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class Plans extends Model
{
    use HasFactory, HasUuid;

    protected $table = "planos";

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'nome',
        'tipo',
        'taxa_adesao',
        'valor_plano_mes',
        'duracao_contrato',
        'taxa_rescisao',
        'n_min',
        'n_max',
        'beneficiarios',
        'descricao',
    ];
}
