<?php

namespace App\Exports;

use App\Models\Bp;
use App\Models\DdHouse;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BpExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return Bp::with(['user','ddHouse'])->get();
    }

    // map what a single member row should look like
    // this method will iterate over each collection item
    public function map( $row ): array
    {
        return [
            $row->ddHouse->cluster_name,
            $row->ddHouse->region,
            $row->ddHouse->code,
            $row->user->name,
            $row->stuff_id,
            $row->pool_number,
            $row->personal_number,
            $row->personal_number,
            $row->blood_group,
            $row->education,
            $row->father_name,
            $row->mother_name,
            $row->division,
            $row->district,
            $row->thana,
            $row->address,
            $row->nid,
            $row->bank_name,
            $row->brunch_name,
            $row->account_number,
            $row->salary,
            Carbon::parse($row->dob)->toFormattedDateString(),
            Carbon::parse($row->joining_date)->toFormattedDateString(),
        ];
    }

    public function headings(): array
    {
        return [
            'Cluster',
            'Region',
            'DD Code',
            'BP Name',
            'Staff ID',
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
        ];
    }
}
