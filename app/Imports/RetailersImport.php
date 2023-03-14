<?php

namespace App\Imports;

use App\Models\DdHouse;
use App\Models\Retailer;
use App\Models\Rso;
use App\Models\Supervisor;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RetailersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return Retailer
     */
    public function model(array $row): Retailer
    {
        return new Retailer([
            'dd_house_id'       => DdHouse::firstWhere('code', $row['dd'])->id,
            'supervisor_id'     => Supervisor::firstWhere('pool_number', $row['supervisor_number'])->id,
            'rso_id'            => Rso::firstWhere('itop_number', $row['rso_number'])->id,
            'retailer_code'     => $row['retailer_code'],
            'retailer_name'     => $row['retailer_name'],
            'retailer_type'     => $row['retailer_type'],
            'enabled'           => $row['enabled'],
            'sim_seller'        => $row['sim_seller'],
            'itop_number'       => $row['itop_number'],
            'service_point'     => $row['service_point'],
            'owner_name'        => $row['owner_name'],
            'own_shop'          => $row['own_shop'],
            'contact_no'        => $row['contact_no'],
            'district'          => $row['district'],
            'thana'             => $row['thana'],
            'address'           => $row['address'],
            'nid'               => $row['nid'],
            'trade_license_no'  => $row['trade_license'],
            'route_id'          => $row['route_code'],
            'password'          => $row['password'],
        ]);
    }
}
