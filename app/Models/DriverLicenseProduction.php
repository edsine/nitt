<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DriverLicenseProduction
 * @package App\Models
 * @version March 18, 2024, 12:49 pm UTC
 *
 * @property string $state
 * @property integer $year
 * @property integer $value
 */
class DriverLicenseProduction extends Model
{

    use HasFactory;

    public $table = 'driver_license_productions';




    public $fillable = [
        'state',
        'year',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'state' => 'string',
        'year' => 'integer',
        'value' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer',
        'state' => 'required|string|unique:driver_license_productions,year,state',
        'value' => 'nullable|integer'
    ];


}
