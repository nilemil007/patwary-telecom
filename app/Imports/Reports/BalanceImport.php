<?php

namespace App\Imports\Reports\Reports;

use App\Models\Balance;
use App\Models\Retailer;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BalanceImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Balance|null
     */
    public function model(array $row): Model|Balance|null
    {
        return new Balance([
            'dd_house_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->dd_house_id,
            'supervisor_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->supervisor_id,
            'rso_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->rso_id,
            'retailer_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->id,
            'date' => $row['date'],
            'amount' => $row['value'],
        ]);
    }
}
