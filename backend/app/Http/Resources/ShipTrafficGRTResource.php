<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShipTrafficGRTResource extends JsonResource
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
            'number_of_vessels' => $this->number_of_vessels,
            'grt' => $this->grt,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'port' => $this->port
        ];
    }
}
