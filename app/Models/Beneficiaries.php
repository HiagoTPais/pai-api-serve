<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class Beneficiaries extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'beneficiarios';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'nome_completo',
        'data_nascimento',
        'nacionalidade',
        'rg',
        'sexo',
        'orgao_expedicao',
        'data_expedicao',
        'cpf',
        'estado_civil',
        'grau_escolaridade',
        'ocupacao',
        'religiao',
        'apelido',
        'rua',
        'numero',
        'bairro',
        'cep',
        'cidade',
        'uf',
        'complemento',
        'ponto_referencia',
        'zona',
        'whatsapp_1_num',
        'whatsapp_1',
        'whatsapp_2_num',
        'whatsapp_2',
        'protocolo_id'
    ];

    // public function contract(): HasMany
    // {
    //     return $this->hasMany(Contract::class);
    // }

    public function pagamento(): HasMany
    {
        return $this->hasMany(PagamentoBeneficiario::class);
    }
}
