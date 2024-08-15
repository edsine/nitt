<?php

namespace App\Exports;

use App\Models\PassengerRoadTransportData;
use Maatwebsite\Excel\Concerns\FromCollection;

class PassengerRoadTransportDataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PassengerRoadTransportData::all();
    }
}
