<?php

namespace App\Exports;

use App\Models\Bts;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BtsExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return collect( Bts::getAllBts() );
    }

    public function headings(): array
    {
        return [
            'DD Code',
            'Site Id',
            'Bts Code',
            'Site Type',
            'Division',
            'District',
            'Thana',
            'Site Status',
            'Network Mode',
            'Address',
            'Longitude',
            'Latitude',
            '2G On Air Date',
            '3G On Air Date',
            '4G On Air Date',
            'Urban/Rural',
            'Priority',
        ];
    }
}
