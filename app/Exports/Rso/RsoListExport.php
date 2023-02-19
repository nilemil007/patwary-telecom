<?php

namespace App\Exports\Rso;

use App\Models\Route;
use App\Models\Rso;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RsoListExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return Rso::with(['user','ddHouse','supervisor'])->get();
    }

    // map what a single member row should look like
    // this method will iterate over each collection item
    public function map( $row ): array
    {
        return [
            $row->ddHouse->cluster_name,
            $row->ddHouse->region,
            $row->ddHouse->code,
            $row->supervisor->user->name,
            $row->supervisor->pool_number,
            isset($row->routes[0])?Route::firstWhere('id', $row->routes[0])->code.', '.Route::firstWhere('id', $row->routes[0])->name:'',
            isset($row->routes[1])?Route::firstWhere('id', $row->routes[1])->code.', '.Route::firstWhere('id', $row->routes[1])->name:'',
            $row->code,
            $row->itop_number,
            $row->pool_number,
            $row->personal_number,
            $row->user->name,
            $row->rid,
            $row->father_name,
            $row->mother_name,
            $row->division,
            $row->district,
            $row->thana,
            $row->address,
            $row->blood_group,
            $row->sr_no,
            $row->account_number,
            $row->bank_name,
            $row->brunch_name,
            $row->routing_number,
            $row->market_type,
            $row->salary,
            $row->education,
            $row->marital_status,
            $row->gender,
            isset($row->dob)?Carbon::parse($row->dob)->toFormattedDateString():'',
            $row->nid,
            $row->status,
            isset($row->joining_date)?Carbon::parse($row->joining_date)->toFormattedDateString():'',
            isset($row->resigning_date)?Carbon::parse($row->resigning_date)->toFormattedDateString():'',
        ];
    }

    public function headings(): array
    {
        return [
            'Cluster',
            'Region',
            'DD Code',
            'Supervisor Name',
            'Supervisor Number',
            'First Route',
            'Second Route',
            'Rso Code',
            'Itop Number',
            'Pool Number',
            'Personal Number',
            'Rso Name',
            'RID',
            'Father Name',
            'Mother Name',
            'Division',
            'District',
            'Thana',
            'Address',
            'Blood Group',
            'SR No',
            'Account Number',
            'Bank Name',
            'Brunch Name',
            'Routing Number',
            'Market Type',
            'Salary',
            'Education',
            'Marital Status',
            'Gender',
            'DOB',
            'NID',
            'Status',
            'Joining Date',
            'Resign Date',
        ];
    }
}
