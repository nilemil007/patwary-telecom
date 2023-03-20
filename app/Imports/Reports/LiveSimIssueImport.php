<?php

namespace App\Imports\Reports;

use App\Models\LiveSimIssue;
use App\Models\Retailer;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LiveSimIssueImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|LiveSimIssue|null
     */
    public function model(array $row): Model|LiveSimIssue|null
    {
        return new LiveSimIssue([
            'dd_house_id'   => Retailer::firstWhere('retailer_code', $row['retailercode'])->dd_house_id,
            'supervisor_id' => Retailer::firstWhere('retailer_code', $row['retailercode'])->supervisor_id,
            'rso_id'        => Retailer::firstWhere('retailer_code', $row['retailercode'])->rso_id,
            'retailer_id'   => Retailer::firstWhere('retailer_code', $row['retailercode'])->id,
            'product_code'  => $row['productcode'],
            'product_name'  => $row['productname'],
            'selling_price' => $row['sellingprice'],
            'sim_serial'    => $row['simno'],
            'issue_date'    => $row['issuedate'],
        ]);
    }
}
