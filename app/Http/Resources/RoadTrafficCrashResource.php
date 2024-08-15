<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoadTrafficCrashResource extends JsonResource
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
            'fatal_cases' => $this->fatal_cases,
            'serious_cases' => $this->serious_cases,
            'minor_cases' => $this->minor_cases,
            'total_cases' => $this->total_cases,
            'persons_injured' => $this->persons_injured,
            'total_casualty' => $this->total_casualty,
            'year' => $this->year,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'persons_killed' => $this->persons_killed
        ];
    }
}
