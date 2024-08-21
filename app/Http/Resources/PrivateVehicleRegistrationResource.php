<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrivateVehicleRegistrationResource extends JsonResource
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
            'vehicle_type' => $this->vehicle_type,
            'private_count' => $this->private_count,
            'commercial_count' => $this->commercial_count,
            'government_count' => $this->government_count,
            'diplomatic_count' => $this->diplomatic_count,
            'schools_count' => $this->schools_count
        ];
    }
}
