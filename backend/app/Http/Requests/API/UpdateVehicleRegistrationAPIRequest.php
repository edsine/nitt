<?php

namespace App\Http\Requests\API;

use App\Models\VehicleRegistration;
use InfyOm\Generator\Request\APIRequest;

class UpdateVehicleRegistrationAPIRequest extends APIRequest
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
        $id = $this->route('vehicle_registration');
        $rules = VehicleRegistration::$rules;

        $rules['vehicle_type'] = 'required|string|unique:vehicle_registrations,year,' . $id . 'vehicle_type';

        return $rules;
    }
}
