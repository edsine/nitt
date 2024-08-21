<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FleetAccidentResource extends JsonResource
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'year' => $this->year,
            'transport_company' => $this->transport_company,
            'vehicle' => $this->vehicle,
            'number_of_accidents' => $this->number_of_accidents
        ];
    }
}
