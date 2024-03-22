<?php

namespace App\Imports;

use App\Models\GrossDomesticProduct;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;

class GrossDomesticProductImport implements OnEachRow, WithHeadingRow, SkipsEmptyRows, WithValidation
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

            $year = intval($row['activity_sector']);
            $transportation_and_storage = floatval($row['transportation_and_storage']);
            $road_transport = floatval($row['road_transport']);
            $rail_transport_and_pipelines = floatval($row['rail_transport_and_pipelines']);
            $water_transport = floatval($row['water_transport']);
            $air_transport = floatval($row['air_transport']);
            $transport_services = floatval($row['transport_services']);
            $post_and_courier_services = floatval($row['post_and_courier_services']);

            $gross_domestic_product = GrossDomesticProduct::where('year', $year)->first();

            if (!empty($gross_domestic_product)) {
                $gross_domestic_product->update([
                    'transportation_and_storage' => $transportation_and_storage,
                    'road_transport' => $road_transport,
                    'rail_transport_and_pipelines' => $rail_transport_and_pipelines,
                    'water_transport' => $water_transport,
                    'air_transport' => $air_transport,
                    'transport_services' => $transport_services,
                    'post_and_courier_services' => $post_and_courier_services
                ]);
            } else {
                GrossDomesticProduct::create([
                    'year' => $year,
                    'transportation_and_storage' => $transportation_and_storage,
                    'road_transport' => $road_transport,
                    'rail_transport_and_pipelines' => $rail_transport_and_pipelines,
                    'water_transport' => $water_transport,
                    'air_transport' => $air_transport,
                    'transport_services' => $transport_services,
                    'post_and_courier_services' => $post_and_courier_services
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
