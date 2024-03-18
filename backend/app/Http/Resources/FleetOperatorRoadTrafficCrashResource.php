<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FleetOperatorRoadTrafficCrashResource extends JsonResource
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
            'fleet_operator' => $this->fleet_operator,
            'number_of_cases' => $this->number_of_cases,
            'number_killed' => $this->number_killed,
            'number_injured' => $this->number_injured,
            'number_of_persons' => $this->number_of_persons,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
