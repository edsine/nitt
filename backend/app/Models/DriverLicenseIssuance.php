<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DriverLicenseIssuance
 * @package App\Models
 * @version March 18, 2024, 1:03 pm UTC
 *
 * @property integer $state
 * @property integer $year
 * @property integer $male_count
 * @property integer $female_count
 * @property integer $vehicle_class
 */
class DriverLicenseIssuance extends Model
{

    use HasFactory;

    public $table = 'driver_license_issuances';




    public $fillable = [
        'state',
        'year',
        'male_count',
        'female_count',
        'vehicle_class'
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
        'male_count' => 'integer',
        'female_count' => 'integer',
        'vehicle_class' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer',
        'state' => 'required|string|unique:driver_license_issuances,year,state',
        'male_count' => 'nullable|integer',
        'female_count' => 'nullable|integer',
        'vehicle_class' => 'required|integer'
    ];


}
