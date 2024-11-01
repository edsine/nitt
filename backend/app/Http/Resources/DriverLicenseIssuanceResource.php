<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverLicenseIssuanceResource extends JsonResource
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
            'male_count' => $this->male_count,
            'female_count' => $this->female_count,
            'vehicle_class' => $this->vehicle_class
        ];
    }
}
