<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AirModeDataResource extends JsonResource
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
            'airport' => $this->airport,
            'year' => $this->year,
            'domestic_passengers_traffic' => $this->domestic_passengers_traffic,
            'international_passengers_traffic' => $this->international_passengers_traffic,
            'aircraft_traffic_domestic' => $this->aircraft_traffic_domestic,
            'aircraft_traffic_international' => $this->aircraft_traffic_international,
            'cargo_traffic_domestic' => $this->cargo_traffic_domestic,
            'cargo_traffic_international' => $this->cargo_traffic_international,
            'mail_traffic_domestic' => $this->mail_traffic_domestic,
            'mail_traffic_international' => $this->mail_traffic_international
        ];
    }
}
