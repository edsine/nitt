<?php

namespace App\Http\Requests\API;

use App\Models\FleetAccident;
use InfyOm\Generator\Request\APIRequest;

class UpdateFleetAccidentAPIRequest extends APIRequest
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

        $rules = FleetAccident::$rules;
        $rules['year'] = 'required|integer|unique:fleet_accidents,year,' . $id;

        return $rules;
    }
}
