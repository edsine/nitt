<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LicenseRenewalResource extends JsonResource
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
            'car' => $this->car,
            'van' => $this->van,
            'lorry' => $this->lorry,
            'mini_bus' => $this->mini_bus,
            'big_bus' => $this->big_bus,
            'tanker' => $this->tanker,
            'trailer' => $this->trailer,
            'tipper' => $this->tipper,
            'tractor' => $this->tractor,
            'state' => $this->state
        ];
    }
}
