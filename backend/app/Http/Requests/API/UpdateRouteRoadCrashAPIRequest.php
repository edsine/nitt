<?php

namespace App\Http\Requests\API;

use App\Models\RouteRoadCrash;
use InfyOm\Generator\Request\APIRequest;

class UpdateRouteRoadCrashAPIRequest extends APIRequest
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
        $id = $this->route('route_road_crash');
        $rules = RouteRoadCrash::$rules;

        $rules['route'] = 'required|string|unique:route_road_crashes,year,' . $id . 'route';

        return $rules;
    }
}
