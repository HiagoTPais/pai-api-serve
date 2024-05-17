<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class TerminationTerm extends Model
{
    use HasFactory, HasUuid;

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $table = "termination_term";

    protected $fillable = [
        'beneficiario_id',
        'motivo_cancelamento',
        'observacao_cancelamento',
    ];
}
