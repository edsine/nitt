<?php

namespace App\Exports;

use App\Models\TrainPunctuality;
use Maatwebsite\Excel\Concerns\FromCollection;

class TrainPuntualityExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TrainPunctuality::all();
    }
}
