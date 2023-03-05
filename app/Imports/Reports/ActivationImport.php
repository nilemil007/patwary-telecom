<?php

namespace App\Imports\Reports;

use App\Models\Reports\Activation;
use App\Models\Retailer;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ActivationImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Activation|null
     */
    public function model(array $row): Model|Activation|null
    {
        return new Activation([
            'dd_house_id' => Retailer::firstWhere('retailer_code', $row['retailercode'])->dd_house_id,
            'supervisor_id' => Retailer::firstWhere('retailer_code', $row['retailercode'])->supervisor_id,
            'rso_id' => Retailer::firstWhere('retailer_code', $row['retailercode'])->rso_id,
            'retailer_id' => Retailer::firstWhere('retailer_code', $row['retailercode'])->id,
            'product_code' => $row['productcode'],
            'product_name' => $row['productname'],
            'sim_serial' => $row['simno'],
            'msisdn' => $row['msisdn'],
            'selling_price' => $row['sellingprice'],
            'activation_date' => $row['activationdate'],
            'bio_date' => $row['biodate'],
        ]);
    }
}
