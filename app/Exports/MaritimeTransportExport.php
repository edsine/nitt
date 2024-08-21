<?php

namespace App\Exports;

use App\Models\MaritimeTransport;
use Maatwebsite\Excel\Concerns\FromCollection;

class MaritimeTransportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MaritimeTransport::all();
    }
}
