<?php

namespace App\Imports\Reports;

use App\Models\Reports\C2C;
use App\Models\Retailer;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class C2CImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|C2C|null
     */
    public function model(array $row): Model|C2C|null
    {
//        dd($row);
        return new C2C([
            'dd_house_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->dd_house_id,
            'supervisor_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->supervisor_id,
            'rso_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->rso_id,
            'retailer_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->id,
            'date' => $row['date'],
            'amount' => $row['value'],
        ]);
    }
}
