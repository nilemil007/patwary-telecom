<?php

namespace App\Exports;

use App\Models\ItopReplace;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItopReplaceExport implements FromCollection
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return ItopReplace::all();
    }
}
