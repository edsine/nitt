<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CorporationPassengerTrafficResource extends JsonResource
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
            'source' => $this->source,
            'destination' => $this->destination,
            'year' => $this->year,
            'count' => $this->count
        ];
    }
}
