<?php

namespace App\Http\Requests\API;

use App\Models\AirModeData;
use InfyOm\Generator\Request\APIRequest;

class UpdateAirModeDataAPIRequest extends APIRequest
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
        $id = $this->route('air_mode_data');

        $rules = AirModeData::$rules;
        $rules['year'] = 'required|year|unique:air_mode_data,year,' . $id;

        return $rules;
    }
}
