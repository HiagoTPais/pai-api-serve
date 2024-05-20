<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboradorDocumento extends Model
{
    use HasFactory;

    protected $table = 'colaborador_documento';
    
    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'contrato_id',
        'arquivo'
    ];
}
