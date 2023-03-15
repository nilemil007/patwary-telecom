<?php

namespace App\Imports;

use App\Models\DdHouse;
use App\Models\Retailer;
use App\Models\Rso;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RetailerImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Retailer|null
     */
    public function model(array $row): Model|Retailer|null
    {
        return new Retailer([
            'dd_house_id'   => DdHouse::firstWhere('code', $row['dd_code'])->id,
            'rso_id'        => Rso::firstWhere('itop_number', $row['rso_number'])->id,
            'retailer_code' => $row['retailer_code'],
            'itop_number'   => $row['itop_number'],
        ]);
    }
}
