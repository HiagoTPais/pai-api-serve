<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Beneficiaries extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request) {
        return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     'nome_completo' => $this->nome_completo,
        //     'data_nascimento' => $this->data_nascimento,
        //     'nacionalidade' => $this->nacionalidade,
        //     'rg' => $this->rg,
        //     'orgao_expedicao' => $this->orgao_expedicao,
        //     'data_expedicao' => $this->data_expedicao,
        //     'cpf' => $this->cpf,
        //     'estado_civil' => $this->estado_civil,
        //     'grau_escolaridade' => $this->grau_escolaridade,
        //     'ocupaçao' => $this->ocupaçao,
        //     'religiao' => $this->religiao,
        //     'apelido' => $this->apelido,
        //     'rua' => $this->rua,
        //     'numero' => $this->numero,
        //     'bairro' => $this->bairro,
        //     'cep' => $this->cep,
        //     'cidade' => $this->cidade,
        //     'uf' => $this->uf,
        //     'complemento' => $this->complemento,
        //     'ponto_referência' => $this->ponto_referência,
        //     'zona' => $this->zona,
        //     'whatsapp_1_num' => $this->whatsapp_1_num,
        //     'whatsapp_1' => $this->whatsapp_1,
        //     'whatsapp_2_num' => $this->whatsapp_2_num,
        //     'whatsapp_2' => $this->whatsapp_2,
        // ];
      } 
}
