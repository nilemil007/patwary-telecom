<?php

namespace App\Imports\Reports\Reports;

use App\Models\C2c;
use App\Models\Retailer;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class C2cImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return C2c
     */
    public function model(array $row): C2c
    {
        return new C2c([
            'dd_house_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->dd_house_id,
            'supervisor_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->supervisor_id,
            'rso_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->rso_id,
            'retailer_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->id,
            'date' => $row['date'],
            'amount' => $row['value'],
        ]);
    }
}
