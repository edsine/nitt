<?php

namespace App\Http\Requests\API;

use App\Models\FleetOperatorRoadTrafficCrash;
use InfyOm\Generator\Request\APIRequest;

class UpdateFleetOperatorRoadTrafficCrashAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $id = $this->route('fleet_accident');

        $rules = FleetOperatorRoadTrafficCrash::$rules;
        $rules['fleet_operator'] = 'required|string|unique:fleet_operator_road_traffic_crashes,fleet_operator,' . $id;

        return $rules;
    }
}
