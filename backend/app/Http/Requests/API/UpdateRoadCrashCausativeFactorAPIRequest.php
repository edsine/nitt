<?php

namespace App\Http\Requests\API;

use App\Models\RoadCrashCausativeFactor;
use InfyOm\Generator\Request\APIRequest;

class UpdateRoadCrashCausativeFactorAPIRequest extends APIRequest
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
        $id = $this->route('road_crash_causative_factor');

        $rules = RoadCrashCausativeFactor::$rules;

        $rules['state'] = 'required|integer|unique:road_crash_causative_factors,state,' . $id;

        return $rules;
    }
}
