<?php

namespace App\Exports;

use App\Models\Route;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RouteExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return collect( Route::getAllRoutes() );
    }

    // Excel Heading With Export
    public function headings():array
    {
        return [
            'Route Code',
            'Route Name',
            'Description',
            'Week Day',
            'Route Length',
        ];
    }
}
