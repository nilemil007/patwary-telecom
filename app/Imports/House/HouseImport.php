<?php

namespace App\Imports\House;

use App\Models\DdHouse;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HouseImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|DdHouse|null
     */
    public function model(array $row): Model|DdHouse|null
    {
        return new DdHouse([
            'cluster_name' => $row['cluster'],
            'region' => $row['region'],
            'code' => $row['dd_code'],
            'name' => $row['dd_name'],
            'market_status' => $row['market_status'],
            'email' => $row['email'],
            'district' => $row['district'],
            'address' => $row['address'],
            'proprietor_name' => $row['proprietor_name'],
            'proprietor_number' => $row['proprietor_number'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
            'bts_code' => $row['bts_code'],
            'established_year' => $row['established_year'],
        ]);
    }
}
