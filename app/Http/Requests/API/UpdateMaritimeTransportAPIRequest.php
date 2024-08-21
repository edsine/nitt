<?php

namespace App\Http\Requests\API;

use App\Models\MaritimeTransport;
use InfyOm\Generator\Request\APIRequest;

class UpdateMaritimeTransportAPIRequest extends APIRequest
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
        $rules = MaritimeTransport::$rules;
        $rules['year'] = $rules['year'].",".$this->route("maritime_transport");
        return $rules;
    }
}
