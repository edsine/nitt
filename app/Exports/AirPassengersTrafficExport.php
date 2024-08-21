<?php

namespace App\Exports;

use App\Models\AirPassengersTraffic;
use Maatwebsite\Excel\Concerns\FromCollection;

class AirPassengersTrafficExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AirPassengersTraffic::all();
    }
}
