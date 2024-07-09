<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class PagamentosFunerario extends Model
{
    use HasFactory, HasUuid;

    protected $table = "pagamentos_funerario";

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'servico_funerario_id',
        'parcelamento',
        'forma_pagamento',
        'bandeira_cartao',
        'n_parcelas',
        'valor_parcelas',
    ];
}
