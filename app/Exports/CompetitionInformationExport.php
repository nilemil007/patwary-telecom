<?php

namespace App\Exports;

use App\Models\CompetitionInformation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompetitionInformationExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return collect( CompetitionInformation::getAllCompetition() );
    }

    public function headings(): array
    {
        return [
            'Cluster',
            'Region',
            'DD Code',
            'Retailer Code',
            'Rso Number',
            'Retailer Itop',
            'BL C2S',
            'GP C2S',
            'ROBI C2S',
            'Airtel C2S',
            'BL GA',
            'GP GA',
            'ROBI GA',
            'Airtel GA',
        ];
    }
}
