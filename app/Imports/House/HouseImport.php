<?php

namespace App\Imports\House;

use App\Models\DdHouse;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HouseImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|DdHouse|null
     */
    public function model(array $row): Model|DdHouse|null
    {
        return new DdHouse([
            'cluster_name' => $row['cluster'],
            'region' => $row['region'],
            'code' => $row['dd_code'],
        ]);
    }
}
