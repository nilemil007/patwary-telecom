<?php

namespace App\Exports;

use App\Models\Bp;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BpExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return collect( Bp::getAllBp() );
    }

    public function headings(): array
    {
        return [
            'Staff ID',
            'BP Name',
            'Pool Number',
            'Personal Number',
            'Gender',
            'Blood Group',
            'Education',
            'Father Name',
            'Mother Name',
            'Division',
            'District',
            'Thana',
            'Address',
            'NID',
            'Bank Name',
            'Brunch Name',
            'Account Number',
            'Salary',
            'DOB',
            'Joining Date',
            'Resigning Date',
        ];
    }
}
