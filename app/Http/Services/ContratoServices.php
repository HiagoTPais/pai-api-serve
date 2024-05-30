<?php

namespace App\Http\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ContratoServices
{
    public function formatAdditional($item)
    {
        $keys = array_keys($item);
        $format = array();

        foreach ($keys as $key => $value) {
            $keys[$key] = strstr($value, '-');
        }

        $number = array_unique($keys);

        for ($i = 1; $i < count($number) + 1; $i++) {
            $filter = array();

            foreach ($item as $key => $value) {
                if (Str::contains($value, 'R$ ')) {
                    $value = Str::replace('R$ ', '', $value);

                    $value = Str::replace(',', '.', $value);

                    $value = (float) $value;
                }

                if (Str::contains($key, "-" . $i)) {
                    $filter += [strstr($key, '-', true) => $value];

                    Log::info($filter);
                }
            }

            array_push($format, $filter);
        }

        return $format;
    }

    protected function formatPlanosBeneficios($item)
    {
        $keys = array_keys($item);
        $format = array();

        foreach ($keys as $key => $value) {
            $keys[$key] = strstr($value, '-');
        }

        $number = array_unique($keys);

        for ($i = 1; $i < count($number) + 1; $i++) {
            $filter = array();

            foreach ($item as $key => $value) {
                if (Str::contains($key, "-" . $i)) {
                    $filter += [strstr($key, '-', true) => $value];
                }
            }

            array_push($format, $filter);
        }

        foreach ($format as $key => $value) {
            if ($value) {
                $format[$key]['valor'] = str_replace("R$ ", "", $format[$key]['valor']);

                $format[$key]['valor'] = str_replace(",", ".", $format[$key]['valor']);

                $format[$key]['valor'] = floatval($format[$key]['valor']);
            } else {
                unset($format[$key]);
            }
        }

        return $format;
    }

    public function formatDependentes($item)
    {
        $key = 0;
        $format = [];

        if ($item['nome_completo_dependente_0']) {
            for ($i = 0; $i < count($item) / 9; $i++) {
                $filter = [
                    "nome_completo_dependente" => $item['nome_completo_dependente_' . $key],
                    "sexo_dependente" => $item['sexo_dependente_' . $key],
                    "nascimento_dependente" => $item['nascimento_dependente_' . $key],
                    "parentesco_dependente" => $item['parentesco_dependente_' . $key],
                    "cpf_dependente" => $item['cpf_dependente_' . $key],
                    "telefone_dependente" => $item['telefone_dependente_' . $key],
                    "whatsapp_dependente" => $item['whatsapp_dependente_' . $key],
                    "seguro_dependente" => $item['seguro_dependente_' . $key],
                    "extra" => $item['extra_' . $key]
                ];

                $key++;

                array_push($format, $filter);
            }
        }

        return $format;
    }
}
