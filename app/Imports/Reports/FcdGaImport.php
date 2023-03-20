<?php

namespace App\Imports\Reports;

use App\Models\FcdGa;
use App\Models\Retailer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class FcdGaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|FcdGa|null
     */
    public function model(array $row): Model|FcdGa|null
    {
        $date = Carbon::instance( Date::excelToDateTimeObject( $row['subscriber_first_call_date_new_rga'] ) )->toDateString();

        return new FcdGa([
            'dd_house_id'   => Retailer::firstWhere('retailer_code', $row['retailer_code'])->dd_house_id,
            'supervisor_id' => Retailer::firstWhere('retailer_code', $row['retailer_code'])->supervisor_id,
            'rso_id'        => Retailer::firstWhere('retailer_code', $row['retailer_code'])->rso_id,
            'retailer_id'   => Retailer::firstWhere('retailer_code', $row['retailer_code'])->id,
            'date'          => $date,
            'activation'    => $row['subscriber_count'],
        ]);
    }
}
