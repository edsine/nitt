<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FleetSizeCompositionResource extends JsonResource
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
            'state' => $this->state,
            'year' => $this->year,
            '4pc' => $this->4pc,
            '7pc' => $this->7pc,
            '10pc' => $this->10pc,
            '14pc' => $this->14pc,
            '18pc' => $this->18pc,
            'coaster' => $this->coaster,
            'big_bus' => $this->big_bus
        ];
    }
}
