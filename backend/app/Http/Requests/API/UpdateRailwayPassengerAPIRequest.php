<?php

namespace App\Http\Requests\API;

use App\Models\RailwayPassenger;
use InfyOm\Generator\Request\APIRequest;

class UpdateRailwayPassengerAPIRequest extends APIRequest
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
        $rules = RailwayPassenger::$rules;
        $rules['year'] = $rules['year'].",".$this->route("railway_passenger");
        return $rules;
    }
}
