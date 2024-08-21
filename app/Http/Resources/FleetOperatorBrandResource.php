<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FleetOperatorBrandResource extends JsonResource
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
            'state' => $this->state,
            'toyota_count' => $this->toyota_count,
            'mercedes_count' => $this->mercedes_count,
            'nissan_count' => $this->nissan_count,
            'peugeot_count' => $this->peugeot_count,
            'volkswagen_count' => $this->volkswagen_count,
            'sharon_count' => $this->sharon_count
        ];
    }
}
