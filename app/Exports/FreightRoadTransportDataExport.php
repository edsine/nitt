<?php

namespace App\Exports;

use App\Models\FreightRoadTransportData;
use Maatwebsite\Excel\Concerns\FromCollection;

class FreightRoadTransportDataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FreightRoadTransportData::all();
    }
}
