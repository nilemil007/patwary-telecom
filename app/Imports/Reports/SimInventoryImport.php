<?php

namespace App\Imports\Reports;

use App\Models\DdHouse;
use App\Models\SimInventory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SimInventoryImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return SimInventory|Model|null
     */
    public function model(array $row): SimInventory|Model|null
    {
        return new SimInventory([
            'dd_house_id'   => DdHouse::firstWhere('code', $row['distributorcode'])->id,
            'product_code'  => $row['productcode'],
            'product_name'  => $row['productname'],
            'lifting_price' => $row['liftingprice'],
            'sim_serial'    => $row['simno'],
        ]);
    }
}
