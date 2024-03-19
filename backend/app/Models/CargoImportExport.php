<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CargoImportExport
 * @package App\Models
 * @version March 18, 2024, 11:58 am UTC
 *
 * @property string $port
 * @property integer $year
 * @property integer $import
 * @property integer $export
 * @property integer $total_throughput
 */
class CargoImportExport extends Model
{

    use HasFactory;

    public $table = 'cargo_import_exports';




    public $fillable = [
        'port',
        'year',
        'import',
        'export',
        'total_throughput'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'port' => 'string',
        'year' => 'integer',
        'import' => 'integer',
        'export' => 'integer',
        'total_throughput' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'integer',
        'year' => 'required|integer',
        'port' => 'required|string|unique:cargo_import_exports,year,port',
        'import' => 'nullable|integer',
        'export' => 'nullable|integer',
        'total_throughput' => 'nullable|integer'
    ];


}
