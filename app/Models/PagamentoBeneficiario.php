<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagamentoBeneficiario extends Model
{
    use HasFactory;

    protected $table = 'pagamento_beneficiario';

    protected $primaryKey = 'id';

    public $incrementing = false;
}
