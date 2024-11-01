<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoadCrashCausativeFactorResource extends JsonResource
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
            'speed_violation' => $this->speed_violation,
            'lost_control' => $this->lost_control,
            'dangerous_driving' => $this->dangerous_driving,
            'tyre_burst' => $this->tyre_burst,
            'brake_failure' => $this->brake_failure,
            'wrongful_overtaking' => $this->wrongful_overtaking,
            'route_violation' => $this->route_violation,
            'mechanically_deficient_vehicle' => $this->mechanically_deficient_vehicle,
            'bad_road' => $this->bad_road,
            'road_obstruction_violation' => $this->road_obstruction_violation,
            'dangerous_overtaking' => $this->dangerous_overtaking,
            'overloading' => $this->overloading,
            'sleeping_on_steering' => $this->sleeping_on_steering,
            'driving_under_alcohol_drug' => $this->driving_under_alcohol_drug,
            'use_of_phone_driving' => $this->use_of_phone_driving,
            'night_journey' => $this->night_journey,
            'fatigue' => $this->fatigue,
            'poor_weather' => $this->poor_weather,
            'sign_light_violation' => $this->sign_light_violation,
            'others' => $this->others
        ];
    }
}
