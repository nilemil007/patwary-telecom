<?php

namespace Database\Seeders;

use App\Models\DdHouse;
use App\Models\Supervisor;

class DdHouseId
{
    public $patwary,$modina,$sumaya,$supervisor01,$supervisor02,$supervisor03;

    public function __construct()
    {
        $this->patwary = DdHouse::firstWhere('code','MYMVAI01')->id;
        $this->modina = DdHouse::firstWhere('code','MYMVAI02')->id;
        $this->sumaya = DdHouse::firstWhere('code','MYMVAI03')->id;
        $this->supervisor01 = Supervisor::firstWhere('dd_house_id', $this->patwary)->id;
        $this->supervisor02 = Supervisor::firstWhere('dd_house_id', $this->modina)->id;
        $this->supervisor03 = Supervisor::firstWhere('dd_house_id', $this->sumaya)->id;
    }
}
