<?php

namespace App\Http\Requests\API;

use App\Models\ShipContainerTraffic;
use InfyOm\Generator\Request\APIRequest;

class UpdateShipContainerTrafficAPIRequest extends APIRequest
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
        $id = $this->route('ship_container_traffic');
        $rules = ShipContainerTraffic::$rules;

        $rules['year'] = 'required|integer|unique:ship_container_traffics,year,' . $id;

        return $rules;
    }
}
