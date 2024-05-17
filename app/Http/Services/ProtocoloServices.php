<?php

namespace App\Http\Services;

use Carbon\Carbon;

class ProtocoloServices
{
    public function createProtocoloId()
    {
        $nowTime = Carbon::now();

        $stringNowTime = $nowTime->toDateTimeString();

        $stringNowTime = str_replace("-", "", $stringNowTime);
        $stringNowTime = str_replace(" ", "", $stringNowTime);
        $stringNowTime = str_replace(":", "", $stringNowTime);

        return $stringNowTime;
    }
}
