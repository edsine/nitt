<?php

namespace App\Http\Requests\API;

use App\Models\CargoImportExport;
use InfyOm\Generator\Request\APIRequest;

class UpdateCargoImportExportAPIRequest extends APIRequest
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
        $id = $this->route('cargo_import_export');
        $rules = CargoImportExport::$rules;

        $rules['port'] = 'required|integer|unique:cargo_import_exports,year,' . $id . 'port';

        return $rules;
    }
}
