<?php

namespace App\Http\Requests\API;

use App\Models\DriverLicenseRenewal;
use InfyOm\Generator\Request\APIRequest;

class UpdateDriverLicenseRenewalAPIRequest extends APIRequest
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

        $id = $this->route('driver_license_renewal');
        $rules = DriverLicenseRenewal::$rules;

        $rules['state'] = 'required|string|unique:driver_license_renewals,year,' . $id . 'state';

        return $rules;
    }
}
