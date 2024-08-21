<?php

namespace App\Http\Requests\API;

use App\Models\VehiclePlateProduction;
use InfyOm\Generator\Request\APIRequest;

class UpdateVehiclePlateProductionAPIRequest extends APIRequest
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
        $id = $this->route('vehicle_plate_production');
        $rules = VehiclePlateProduction::$rules;

        $rules['vehicle_category'] = 'required|string|unique:vehicle_plate_productions,year,' . $id . 'vehicle_category';

        return $rules;
    }
}
