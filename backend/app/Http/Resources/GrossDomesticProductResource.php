<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GrossDomesticProductResource extends JsonResource
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
            'year' => $this->year,
            'transportation_and_storage' => $this->transportation_and_storage,
            'road_transport' => $this->road_transport,
            'rail_transport_and_pipelines' => $this->rail_transport_and_pipelines,
            'water_transport' => $this->water_transport,
            'air_transport' => $this->air_transport,
            'transport_services' => $this->transport_services,
            'post_and_courier_services' => $this->post_and_courier_services,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

    
}
