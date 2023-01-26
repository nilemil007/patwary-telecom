<?php

namespace App\Imports;

use App\Models\Bts;
use App\Models\DdHouse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class BtsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Bts|null
     */
    public function model(array $row): Model|Bts|null
    {
        return new Bts([
            'dd_house_id'           => $row['dd'],
            'site_id'               => $row['site_id'],
            'bts_code'              => $row['bts_code'],
            'site_type'             => $row['site_type'],
            'division'              => $row['division'],
            'district'              => $row['district'],
            'thana'                 => $row['thana'],
            'site_status'           => $row['site_status'],
            'network_mode'          => $row['network_mode'],
            'address'               => $row['address'],
            'longitude'             => $row['longitude'],
            'latitude'              => $row['latitude'],
            'two_g_on_air_date'     => $row['2g_on_air_date'],
            'three_g_on_air_date'   => $row['3g_on_air_date'],
            'four_g_on_air_date'    => $row['4g_on_air_date'],
            'urban_rural'           => $row['urban_rural'],
            'priority'              => $row['priority'],
        ]);
    }
}
