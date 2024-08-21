<?php

namespace App\Http\Requests\API;

use App\Models\TrafficOffence;
use InfyOm\Generator\Request\APIRequest;

class UpdateTrafficOffenceAPIRequest extends APIRequest
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
        $id = $this->route('traffic_offence');
        $rules = TrafficOffence::$rules;

        $rules['state'] = 'required|string|unique:traffic_offences,year,' . $id . 'state';

        return $rules;
    }
}
