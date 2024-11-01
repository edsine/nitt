<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShipContainerTrafficResource extends JsonResource
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
            'year' => $this->year,
            'ship_traffic' => $this->ship_traffic,
            'container_traffic' => $this->container_traffic,
            'cargo_throughput' => $this->cargo_throughput,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
