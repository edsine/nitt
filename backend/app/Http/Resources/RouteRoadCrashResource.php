<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RouteRoadCrashResource extends JsonResource
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
            'route' => $this->route,
            'number_of_crashes' => $this->number_of_crashes,
            'year' => $this->year,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
