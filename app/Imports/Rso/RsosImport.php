<?php

namespace App\Imports\Rso;

use App\Models\Rso;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RsosImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Rso|null
     */
    public function model(array $row): Model|Rso|null
    {
        return new Rso([
            'dd_house_id' => $row['dd_code'],
            'user_id' => $row['user_id'],
            'itop_number' => $row['itop_number'],
        ]);
    }
}
