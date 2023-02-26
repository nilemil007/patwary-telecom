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
            'user_id' => $row['user'],
            'supervisor_id' => $row['supervisor'],
            'dd_house_id' => $row['dd_house'],
            'code' => $row['rso_code'],
            'itop_number' => $row['itop_number'],
            'pool_number' => $row['pool_number'],
            'personal_number' => $row['personal_number'],
            'rid' => $row['rid'],
            'father_name' => $row['father_name'],
            'mother_name' => $row['mother_name'],
            'division' => $row['division'],
            'district' => $row['district'],
            'thana' => $row['thana'],
            'address' => $row['address'],
            'blood_group' => $row['blood_group'],
            'sr_no' => $row['sr_no'],
            'account_number' => $row['account_number'],
            'bank_name' => $row['bank_name'],
            'brunch_name' => $row['brunch_name'],
            'routing_number' => $row['routing_number'],
            'market_type' => $row['market_type'],
            'salary' => $row['salary'],
            'education' => $row['education'],
            'marital_status' => $row['marital_status'],
            'gender' => $row['gender'],
            'dob' => $row['dob'],
            'nid' => $row['nid'],
            'joining_date' => $row['joining_date'],
        ]);
    }
}
