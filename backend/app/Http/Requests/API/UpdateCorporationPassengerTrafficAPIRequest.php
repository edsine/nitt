<?php

namespace App\Http\Requests\API;

use App\Models\CorporationPassengerTraffic;
use InfyOm\Generator\Request\APIRequest;

class UpdateCorporationPassengerTrafficAPIRequest extends APIRequest
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
        $id = $this->route('corporation_passenger_traffic');
        $rules = CorporationPassengerTraffic::$rules;

        $rules['source'] = 'required|integer|unique:corporation_passenger_traffics,year,' . $id . 'source';

        return $rules;
    }
}
