<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CargoImportExportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'port' => $this->port,
            'year' => $this->year,
            'import' => $this->import,
            'export' => $this->export,
            'total_throughput' => $this->total_throughput,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
