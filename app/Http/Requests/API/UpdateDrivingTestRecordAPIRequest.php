<?php

namespace App\Http\Requests\API;

use App\Models\DrivingTestRecord;
use InfyOm\Generator\Request\APIRequest;

class UpdateDrivingTestRecordAPIRequest extends APIRequest
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

        $id = $this->route('driving_test_record');
        $rules = DrivingTestRecord::$rules;

        $rules['state'] = 'required|string|unique:driving_test_records,year,' . $id . 'state';

        return $rules;
    }
}
