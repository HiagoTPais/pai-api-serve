<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class ProdutosFunerario extends Model
{
    use HasFactory, HasUuid;

    protected $table = "produtos_funerario";

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'servico_funerario_id',
        'quantidade',
        'valor',
        'produto_servico',
    ];
}
