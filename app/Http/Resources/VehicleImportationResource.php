<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleImportationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var VehicleImportation $vehicle_importation */
        $vehicle_importation = $this;
        return [
            'id' => $vehicle_importation->id,
            'year' => $vehicle_importation->year,
            'new_vehicle_count' => $vehicle_importation->new_vehicle_count,
            'used_vehicle_count' => $vehicle_importation->used_vehicle_count,
            'vehicle_category_name' => getVehicleCategories()[$vehicle_importation->vehicle_category],
            'vehicle_category' => $vehicle_importation->vehicle_category,
            'created_at' => $vehicle_importation->created_at->toISOString(),
            'updated_at' => $vehicle_importation->updated_at->toISOString(),
            'deleted_at' => $vehicle_importation->deleted_at
        ];
    }
}
