<?php

namespace App\Exports;

use App\Models\MaritimeAdministration;
use Maatwebsite\Excel\Concerns\FromCollection;

class MaritimeAdministrationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MaritimeAdministration::all();
    }
}
