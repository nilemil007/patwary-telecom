<?php

namespace App\Imports\Retailer;

use App\Models\DdHouse;
use App\Models\Retailer;
use App\Models\Rso;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RetailerListImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Retailer|null
     */
    public function model(array $row): Model|Retailer|null
    {
        return new Retailer([
            'dd_code' => $row['dd_code'],
            'supervisor_id' => $row['supervisor_number'],
            'retailer_code' => $row['retailer_code'],
            'retailer_name' => $row['retailer_name'],
            'retailer_type' => $row['retailer_type'],
            'enabled' => $row['enabled'],
            'sim_seller' => $row['sim_seller'],
            'rso_number' => $row['rso_number'],
            'itop_number' => $row['itop_number'],
            'service_point' => $row['service_point'],
            'owner_name' => $row['owner_name'],
            'own_shop' => $row['own_shop'],
            'contact_no' => $row['contact_no'],
            'district' => $row['district'],
            'thana' => $row['thana'],
            'address' => $row['address'],
            'nid' => $row['nid'],
            'trade_license_no' => $row['trade_license'],
            'bts_id' => $row['bts_code'],
            'route_id' => $row['route_code'],
            'password' => $row['password'],
        ]);
    }
}
