<?php

namespace App\Http\Requests\API;

use App\Models\RailwaySafety;
use InfyOm\Generator\Request\APIRequest;

class UpdateRailwaySafetyAPIRequest extends APIRequest
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
        $rules = RailwaySafety::$rules;
        $rules['year'] = $rules['year'].",".$this->route("railway_safety");
        return $rules;
    }
}
