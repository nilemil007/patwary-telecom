<?php

namespace App\Exports;

use App\Models\CompetitionInformation;
use App\Models\OthersOperatorInformation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CompetitionInformationExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return OthersOperatorInformation::all();
    }

    // map what a single member row should look like
    // this method will iterate over each collection item
    public function map( $row ): array
    {
        return [
            $row->cluster,
            $row->region,
            $row->dd_code,
            $row->retailer_code,
            $row->rso_number,
            $row->retailer_number,
            $row->bl_tarshiary,
            $row->gp_tarshiary,
            $row->robi_tarshiary,
            $row->airtel_tarshiary,
            $row->bl_ga,
            $row->gp_ga,
            $row->robi_ga,
            $row->airtel_ga,
        ];
    }

    public function headings(): array
    {
        return [
            'Cluster',
            'Region',
            'DD Code',
            'RETAILER_CODE',
            'I_TOP_UP_SR_NUMBER',
            'Retailer I_TOP_UP_NUMBER',
            'BL C2S',
            'GP C2S',
            'ROBI C2S',
            'Airtel C2S',
            'BL GA',
            'GP GA',
            'Robi GA',
            'Airtel GA',
        ];
    }
}
