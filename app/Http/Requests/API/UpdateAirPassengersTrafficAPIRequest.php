<?php

namespace App\Http\Requests\API;

use App\Models\AirPassengersTraffic;
use InfyOm\Generator\Request\APIRequest;

class UpdateAirPassengersTrafficAPIRequest extends APIRequest
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
        $rules = AirPassengersTraffic::$rules;
        $rules['year'] = $rules['year'] . "," . $this->route("air_passengers_traffic");

        return $rules;
    }
}
