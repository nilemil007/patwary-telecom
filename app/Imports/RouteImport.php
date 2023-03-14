<?php

namespace App\Imports;

use App\Models\Route;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RouteImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Route|null
     */
    public function model(array $row): Model|Route|null
    {
        return new Route([
            'code'          => $row['route_code'],
            'name'          => $row['route_name'],
            'description'   => $row['description'],
            'weekdays'      => $row['weekday'],
            'length'        => $row['route_length'],
        ]);
    }
}
