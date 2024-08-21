<?php

namespace App\Exports;

use App\Models\VehicleImportation;
use Maatwebsite\Excel\Concerns\FromCollection;

class VehicleImportationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return VehicleImportation::all();
    }
}
