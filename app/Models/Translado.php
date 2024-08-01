<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class Translado extends Model
{
    use HasFactory, HasUuid;

    protected $table = "translado";

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'servico_funerario_id',
        'havera_translado',
        'cep_partida',
        'rua_partida',
        'numero_partida',
        'bairro_partida',
        'cidade_partida',
        'uf_partida',
        'complemento_partida',
        'ponto_referencia_partida',
        'zona_partida',
        'cep_destino',
        'rua_destino',
        'numero_destino',
        'bairro_destino',
        'cidade_destino',
        'uf_destino',
        'complemento_destino',
        'ponto_referencia_destino',
        'zona_destino',
    ];
}
