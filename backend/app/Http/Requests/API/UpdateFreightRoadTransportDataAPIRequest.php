<?php

namespace App\Http\Requests\API;

use App\Models\FreightRoadTransportData;
use InfyOm\Generator\Request\APIRequest;

class UpdateFreightRoadTransportDataAPIRequest extends APIRequest
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
        // $rules = FreightRoadTransportData::$rules;
        $id = $this->route('freight_road_transport_data');
        $rules = [
            'year' => 'required|unique:freight_road_transport_data,' .$id,
            'number_of_tonnes_carried' => 'required',
            'number_of_vehicle_in_the_fleet' => 'required',
            'revenue_from_operation' => 'required',
            'number_of_employees' => 'required',
            'annual_cost_of_vehicle_maintenance' => 'required',
            'number_of_accidents' => 'required'
        ];

        return $rules;
    }
}
