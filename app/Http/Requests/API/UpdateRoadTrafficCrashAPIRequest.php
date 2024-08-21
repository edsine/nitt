<?php

namespace App\Http\Requests\API;

use App\Models\RoadTrafficCrash;
use InfyOm\Generator\Request\APIRequest;

class UpdateRoadTrafficCrashAPIRequest extends APIRequest
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
        $id = $this->route('road_traffic_crash');

        $rules = RoadTrafficCrash::$rules;

        $rules['state'] = 'required|integer|unique:road_traffic_crashes,state,' . $id;

        return $rules;
    }
}
