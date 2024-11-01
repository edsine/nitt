<?php

namespace App\Http\Requests\API;

use App\Models\GrossDomesticProduct;
use InfyOm\Generator\Request\APIRequest;

class UpdateGrossDomesticProductAPIRequest extends APIRequest
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
        $id = $this->route('gross_domestic_product');

        $rules = GrossDomesticProduct::$rules;
        $rules['year'] = 'required|integer|unique:gross_domestic_products,year,' . $id;

        return $rules;
    }
}
