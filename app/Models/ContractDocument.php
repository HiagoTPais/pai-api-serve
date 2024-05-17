<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class ContractDocument extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'contrato_documento';
    
    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'contrato_id',
        'file_name'
    ];
}
