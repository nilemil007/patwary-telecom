<?php

namespace App\Imports\Reports\Reports;

use App\Models\LiveC2c;
use App\Models\Retailer;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LiveC2cImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return LiveC2c
     */
    public function model(array $row): LiveC2c
    {
        return new LiveC2c([
            'dd_house_id' => Retailer::firstWhere('itop_number', $row['to_msisdn'])->dd_house_id,
            'supervisor_id' => Retailer::firstWhere('itop_number', $row['to_msisdn'])->supervisor_id,
            'rso_id' => Retailer::firstWhere('itop_number', $row['to_msisdn'])->rso_id,
            'retailer_id' => Retailer::firstWhere('itop_number', $row['to_msisdn'])->id,
            'date' => now(),
            'amount' => $row['transfer_mrp'],
        ]);
    }
}
