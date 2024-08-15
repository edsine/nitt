<?php

namespace App\Http\Requests\API;

use App\Models\PassengerRoadTransportData;
use InfyOm\Generator\Request\APIRequest;

class UpdatePassengerRoadTransportDataAPIRequest extends APIRequest
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
        $rules = PassengerRoadTransportData::$rules;
        $rules['year'] = $rules['year'] . "," . $this->route("passenger_road_transport_datum");

        return $rules;
    }
}
