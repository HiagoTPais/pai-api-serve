<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiarioDocumento extends Model
{
    use HasFactory;

    protected $table = 'beneficiario_documento';
    
    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'contrato_id',
        'arquivo'
    ];
}
