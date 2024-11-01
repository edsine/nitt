<?php

namespace App\Http\Requests\API;

use App\Models\PortVehicularTraffic;
use InfyOm\Generator\Request\APIRequest;

class UpdatePortVehicularTrafficAPIRequest extends APIRequest
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
        $id = $this->route('port_vehicular_traffic');
        $rules = PortVehicularTraffic::$rules;

        $rules['port'] = 'required|string|unique:port_vehicular_traffics,year,' . $id . 'port';

        return $rules;
    }
}
