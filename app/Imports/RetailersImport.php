<?php

namespace App\Imports;

use App\Models\DdHouse;
use App\Models\Retailer;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RetailersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Retailer|null
     */
    public function model(array $row): Model|Retailer|null
    {
        return new Retailer([
            'dd_house_id'       => $row['dd_code'],
            'retailer_code'     => $row['retailer_code'],
            'rso_id'            => $row['rso_number'],
            'itop_number'       => $row['itop_number'],
        ]);
    }
}
