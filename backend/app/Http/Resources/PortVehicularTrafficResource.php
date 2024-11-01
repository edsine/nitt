<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PortVehicularTrafficResource extends JsonResource
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
            'traffic' => $this->traffic,
            'year' => $this->year,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
