<?php

namespace App\Http\Requests\API;

use App\Models\TrainPunctuality;
use InfyOm\Generator\Request\APIRequest;

class UpdateTrainPunctualityAPIRequest extends APIRequest
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
        $rules = TrainPunctuality::$rules;
        $rules['year'] = $rules['year'].",".$this->route("trains_punctuality");
        return $rules;
    }
}
