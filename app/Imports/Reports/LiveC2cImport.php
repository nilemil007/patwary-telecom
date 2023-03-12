<?php

namespace App\Imports\Reports;

use App\Models\Reports\LiveC2c;
use App\Models\Retailer;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LiveC2cImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|LiveC2c|null
     */
    public function model(array $row): Model|LiveC2c|null
    {
//        dd($row);
        return new LiveC2c([
            'dd_house_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->dd_house_id,
            'supervisor_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->supervisor_id,
            'rso_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->rso_id,
            'retailer_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->id,
            'date' => $row['date'],
            'amount' => $row['value'],
        ]);
    }
}
