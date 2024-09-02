<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class Materiais extends Model
{
    use HasFactory, HasUuid;

    protected $table = "materiais";

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        "tanatorio_id",
        "servico_funerario_id",
        "quantidade",
        "valor",
        "produto",
    ];
}
