<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class VehicleRegistration
 * @package App\Models
 * @version March 18, 2024, 2:05 pm UTC
 *
 * @property integer $year
 * @property integer $vehicle_type
 * @property integer $private_count
 * @property integer $commercial_count
 * @property integer $government_count
 * @property integer $diplomatic_count
 * @property integer $schools_count
 */
class VehicleRegistration extends Model
{

    use HasFactory;

    public $table = 'vehicle_registrations';




    public $fillable = [
        'year',
        'vehicle_type',
        'private_count',
        'commercial_count',
        'government_count',
        'diplomatic_count',
        'schools_count'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'integer',
        'vehicle_type' => 'integer',
        'private_count' => 'integer',
        'commercial_count' => 'integer',
        'government_count' => 'integer',
        'diplomatic_count' => 'integer',
        'schools_count' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer',
        'vehicle_type' => 'required|integer|unique:vehicle_registrations,year,vehicle_type',
        'private_count' => 'nullable|integer',
        'commercial_count' => 'nullable|integer',
        'government_count' => 'nullable|integer',
        'diplomatic_count' => 'nullable|integer',
        'schools_count' => 'nullable|integer'
    ];


}
