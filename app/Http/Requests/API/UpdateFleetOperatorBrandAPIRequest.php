<?php

namespace App\Http\Requests\API;

use App\Models\FleetOperatorBrand;
use InfyOm\Generator\Request\APIRequest;

class UpdateFleetOperatorBrandAPIRequest extends APIRequest
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
        $id = $this->route('fleet_operator_brand');
        $rules = FleetOperatorBrand::$rules;

        $rules['state'] = 'required|string|unique:fleet_operator_brands,year,' . $id . 'state';

        return $rules;
    }
}
