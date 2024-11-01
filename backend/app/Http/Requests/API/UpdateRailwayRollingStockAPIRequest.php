<?php

namespace App\Http\Requests\API;

use App\Models\RailwayRollingStock;
use InfyOm\Generator\Request\APIRequest;

class UpdateRailwayRollingStockAPIRequest extends APIRequest
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
        $rules = RailwayRollingStock::$rules;
        $rules['year'] = $rules['year'].",".$this->route("railway_rolling_stock");
        return $rules;
    }
}
