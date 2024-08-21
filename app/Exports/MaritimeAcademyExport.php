<?php

namespace App\Exports;

use App\Models\MaritimeAcademy;
use Maatwebsite\Excel\Concerns\FromCollection;

class MaritimeAcademyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MaritimeAcademy::all();
    }
}
