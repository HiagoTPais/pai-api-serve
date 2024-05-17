<?php

namespace App\Http\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ContratoServices
{
    public function formatAdditional($item)
    {
        // Log::info('formatAdditional');
        // Log::info($item);

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
}
