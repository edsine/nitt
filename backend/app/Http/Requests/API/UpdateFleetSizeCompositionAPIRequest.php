<?php

namespace App\Http\Requests\API;

use App\Models\FleetSizeComposition;
use InfyOm\Generator\Request\APIRequest;

class UpdateFleetSizeCompositionAPIRequest extends APIRequest
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

        $id = $this->route('fleet_size_composition');
        $rules = FleetSizeComposition::$rules;

        $rules['state'] = 'required|string|unique:fleet_size_compositions,year,' . $id . 'state';

        return $rules;
    }
}
