<?php

namespace App\Http\Requests\API;

use App\Models\VehicleLicenseRegistration;
use InfyOm\Generator\Request\APIRequest;

class UpdateVehicleLicenseRegistrationAPIRequest extends APIRequest
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


        $id = $this->route('vehicle_license_registration');
        $rules = VehicleLicenseRegistration::$rules;

        $rules['state'] = 'required|string|unique:vehicle_license_registrations,year,' . $id . 'state';

        return $rules;
    }
}
