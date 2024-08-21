<?php

namespace App\Exports;

use App\Models\RailwayRollingStock;
use Maatwebsite\Excel\Concerns\FromCollection;

class RailwayRollingStockExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RailwayRollingStock::all();
    }
}
