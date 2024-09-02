<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class RelatorioTanatorio extends Model
{
    use HasFactory, HasUuid;

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $table = "relatorio_tanatorio";

    protected $fillable = [
        'tanatorio_id',
        'arquivo'
    ];
}
