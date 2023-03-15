<?php

namespace App\Imports\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|User|null
     */
    public function model(array $row): Model|User|null
    {
        return new User([
            'name'          => $row['name'],
            'username'      => $row['username'],
            'dd_house_id'   => $row['dd_code'],
            'role'          => $row['role'],
            'password'      => $row['password'],
        ]);
    }
}
