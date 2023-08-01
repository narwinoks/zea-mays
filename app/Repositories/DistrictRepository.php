<?php

namespace App\Repositories;

use App\Interface\DistrictInterface;
use Illuminate\Support\Facades\DB;

class DistrictRepository implements  DistrictInterface
{

    public function getDistrictByCode($code)
    {
        $data = DB::table('indonesia_districts')->where('code', $code)->first();
        return $data;
    }
}
