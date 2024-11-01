<?php

namespace App\Http\Requests\API;

use App\Models\ShipTrafficGRT;
use InfyOm\Generator\Request\APIRequest;

class UpdateShipTrafficGRTAPIRequest extends APIRequest
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
        $id = $this->route('ship_traffic_g_r_t');
        $rules = ShipTrafficGRT::$rules;

        $rules['port'] = 'required|string|unique:ship_traffic_g_r_ts,year,' . $id . 'port';

        return $rules;
    }
}
