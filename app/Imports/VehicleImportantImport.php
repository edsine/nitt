<?php

namespace App\Imports;

use App\Models\VehicleImportation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;


class VehicleImportantImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         $vehicle = VehicleImportation::find($row['id']);

         if ($vehicle) {
            // Update the existing record
            $vehicle->update([
                'year'  => $row['year'],
                'vehicle_category' => $row['vehicle_category'],
                'new_vehicle_count' => $row['new_vehicle_count'],
                'used_vehicle_count' => $row['used_vehicle_count'],
            ]);

            return $vehicle;
        } else {
            // Create a new record
            return new VehicleImportation([
                'id' => $row['id'], // Ensure the ID is set if you want to use the ID from the CSV
                'year'  => $row['year'],
                'vehicle_category' => $row['vehicle_category'],
                'new_vehicle_count' => $row['new_vehicle_count'],
                'used_vehicle_count' => $row['used_vehicle_count'],
            ]);
        }
    }
}




      

