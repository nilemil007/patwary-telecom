<?php

namespace App\Imports\Reports;

use App\Models\Esaf;
use App\Models\Retailer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EsafImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|Esaf|null
     */
    public function model(array $row): Model|Esaf|null
    {
        $date = Carbon::instance( Date::excelToDateTimeObject( $row['biometric_verification_date'] ) )->toDateString();

        return new Esaf([
            'dd_house_id'       => Retailer::firstWhere('retailer_code', $row['bio_login_user'])->dd_house_id,
            'supervisor_id'     => Retailer::firstWhere('retailer_code', $row['bio_login_user'])->supervisor_id,
            'rso_id'            => Retailer::firstWhere('retailer_code', $row['bio_login_user'])->rso_id,
            'retailer_id'       => Retailer::firstWhere('retailer_code', $row['bio_login_user'])->id,
            'customer_name'     => $row['customer_name'],
            'customer_number'   => $row['msisdn'],
            'alternate_number'  => $row['alternate_number'],
            'email'             => $row['email'],
            'gender'            => $row['gender'],
            'reason'            => $row['reason'],
            'address'           => $row['present_address'],
            'date'              => $date,
            'status'            => $row['status'],
        ]);
    }
}
