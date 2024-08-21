<?php

namespace App\Http\Requests\API;

use App\Models\VehicleImportation;
use InfyOm\Generator\Request\APIRequest;

class UpdateVehicleImportationAPIRequest extends APIRequest
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
        $rules = VehicleImportation::$rules;
        $rules['vehicle_category'] = 'required|integer|unique:vehicle_importation,year,' . $this->route("vehicle_importation") . 'vehicle_category';
        return $rules;
    }
}
