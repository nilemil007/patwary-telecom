<?php

namespace App\Imports\Reports;

use App\Models\Bso;
use App\Models\Retailer;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BsoImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Bso|null
     */
    public function model(array $row): Model|Bso|null
    {
        return new Bso([
            'dd_house_id'   => Retailer::firstWhere('itop_number', $row['sender_service_number'])->dd_house_id,
            'supervisor_id' => Retailer::firstWhere('itop_number', $row['sender_service_number'])->supervisor_id,
            'rso_id'        => Retailer::firstWhere('itop_number', $row['sender_service_number'])->rso_id,
            'retailer_id'   => Retailer::firstWhere('itop_number', $row['sender_service_number'])->id,
            'day'           => $row['txn'],
            'amount'        => $row['tot'],
            'eligibility'   => $row['eligibility'],
        ]);
    }
}
