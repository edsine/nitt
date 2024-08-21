<?php

namespace App\Exports;

use App\Models\ShipContainerTraffic;
use Maatwebsite\Excel\Concerns\FromCollection;

class ShipContainerTrafficExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ShipContainerTraffic::all();
    }
}
