<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentHistory extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'indentificacao' => $this->indentificacao,
            'nome' => $this->name,
            'tipo' => $this->type,
            'vencimento' => $this->invoice_due_date,
            'valor' => $this->value,
            'pagamento' => $this->payment,
            'cobrador' => $this->collector,
        ];
    }
}
