<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DriverLicenseRenewal
 * @package App\Models
 * @version March 18, 2024, 1:12 pm UTC
 *
 * @property string $state
 * @property integer $year
 * @property integer $vehicle_class
 * @property integer $male_count
 * @property integer $female_count
 */
class DriverLicenseRenewal extends Model
{

    use HasFactory;

    public $table = 'driver_license_renewals';




    public $fillable = [
        'state',
        'year',
        'vehicle_class',
        'male_count',
        'female_count'
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
        'vehicle_class' => 'integer',
        'male_count' => 'integer',
        'female_count' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer',
        'state' => 'required|string|unique:driver_license_renewals,year,state',
        'vehicle_class' => 'required|integer',
        'male_count' => 'nullable|integer',
        'female_count' => 'nullable|integer'
    ];


}
