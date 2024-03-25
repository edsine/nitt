<?php

namespace App\Imports;

use App\Models\ShipContainerTraffic;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;

class ShipContainerTrafficImport implements OnEachRow, WithHeadingRow, SkipsEmptyRows, WithValidation
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
            $ship_traffic = floatval($row['ship_traffic']);
            $container_traffic = floatval($row['container_traffic']);
            $cargo_throughput = floatval($row['cargo_throughput']);

            $ship_container_traffic = ShipContainerTraffic::where('year', $year)->first();

            if (!empty($ship_container_traffic)) {
                $ship_container_traffic->update([
                    'ship_traffic' => $ship_traffic,
                    'container_traffic' => $container_traffic,
                    'cargo_throughput' => $cargo_throughput,
                ]);
            } else {
                ShipContainerTraffic::create([
                    'year' => $year,
                    'ship_traffic' => $ship_traffic,
                    'container_traffic' => $container_traffic,
                    'cargo_throughput' => $cargo_throughput,
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
