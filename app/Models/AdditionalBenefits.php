<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class AdditionalBenefits extends Model
{
    use HasFactory, HasUuid;

    protected $table = "beneficios_adicionais";
    
    public $incrementing = false;

    protected $fillable = [
        'plano_id',
        'valor',
        'beneficio_adicional',
    ];
}
