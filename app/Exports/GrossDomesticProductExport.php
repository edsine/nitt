<?php

namespace App\Exports;

use App\Models\GrossDomesticProduct;
use Maatwebsite\Excel\Concerns\FromCollection;

class GrossDomesticProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return GrossDomesticProduct::all();
    }
}
