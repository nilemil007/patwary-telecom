<?php

namespace Database\Seeders;

use App\Models\DdHouse;
use App\Models\Supervisor;

class DbTablesId
{

    // Get DD House ID
    public static function ddHouseId( $ddCode = 'MYMVAI01' )
    {
        return DdHouse::firstWhere('code', $ddCode)->id;
    }

    // Get Supervisor ID
    public static function supervisorId( $ddCode = 'MYMVAI01' )
    {
        $houseId = DdHouse::firstWhere('code', $ddCode)->id;

        return Supervisor::firstWhere('dd_house_id', $houseId)->id;
    }
}
