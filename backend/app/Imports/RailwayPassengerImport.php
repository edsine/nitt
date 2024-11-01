<?php

namespace App\Imports;

use App\Models\RailwayPassenger;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;

class RailwayPassengerImport implements OnEachRow, WithHeadingRow, SkipsEmptyRows, WithValidation
{
    private $status = true;
    private $message = '';
    use Importable;

    public function onRow(Row $row)
    {
        ini_set('max_execution_time', 10000);
        $rowIndex = $row->getIndex() - 1;
        $row = $row->toArray();

        try {
            DB::beginTransaction();

            $year = intval($row['year']);
            $passenger_volume = floatval($row['passenger_volume']);
            $passenger_revenue = floatval($row['passenger_revenue']);
            $freight_volume = floatval($row['freight_volume']);
            $freight_revenue = floatval($row['freight_revenue']);

            $railway_passenger = RailwayPassenger::where('year', $year)->first();

            if (!empty($railway_passenger)) {
                $railway_passenger->update([
                    'passengers_carried' => $passenger_volume,
                    'passenger_revenue_generation' => $passenger_revenue,
                    'freight_carried' => $freight_volume,
                    'freight_revenue_generation' => $freight_revenue,
                ]);
            } else {
                RailwayPassenger::create([
                    'year' => $year,
                    'passengers_carried' => $passenger_volume,
                    'passenger_revenue_generation' => $passenger_revenue,
                    'freight_carried' => $freight_volume,
                    'freight_revenue_generation' => $freight_revenue,
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            $this->status = false;
            $this->message = $th->getMessage();
            DB::rollback();
        }
    }

    public function rules(): array
    {
        return [];
    }

    public function batchSize(): int
    {
        return 1000;
    }


    public function import($file)
    {
        $import = new self();
        \Maatwebsite\Excel\Facades\Excel::import($import, $file);
        return [
            'status' => $import->status,
            'message' => $import->message
        ];
    }
}
