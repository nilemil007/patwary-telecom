<?php

namespace App\Imports;

use App\Models\DdHouse;
use App\Models\Retailer;
use App\Models\Rso;
use App\Models\Supervisor;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RetailerImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Retailer|null
     */
    public function model(array $row): Model|Retailer|null
    {
//        dd($row);
        return new Retailer([
            'dd_house_id'       => $row['distributor_code'],
            'rso_id'            => $row['i_top_up_sr_number'],
            'retailer_code'     => $row['retailer_code'],
            'itop_number'       => $row['i_top_up_number'],
            'supervisor_id'     => Rso::firstWhere('itop_number', $row['i_top_up_sr_number'])->supervisor_id,
            'route_id'          => $row['route'],
            'retailer_name'     => $row['retailer_name'],
            'retailer_type'     => $row['retailer_type'],
            'enabled'           => $row['enabled'],
            'sim_seller'        => $row['sim_seller'],
            'service_point'     => $row['service_point'],
            'owner_name'        => $row['owner_name'],
            'own_shop'          => $row['own_shop'],
            'district'          => $row['district'],
            'thana'             => $row['thana'],
            'address'           => $row['address'],
        ]);
    }
}
