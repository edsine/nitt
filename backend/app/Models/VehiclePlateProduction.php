<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class VehiclePlateProduction
 * @package App\Models
 * @version March 18, 2024, 12:30 pm UTC
 *
 * @property integer $vehicle_category
 * @property integer $year
 * @property integer $value
 */
class VehiclePlateProduction extends Model
{

    use HasFactory;

    public $table = 'vehicle_plate_productions';




    public $fillable = [
        'vehicle_category',
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
        'vehicle_category' => 'integer',
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
        'vehicle_category' => 'required|integer|unique:vehicle_plate_productions,year,vehicle_category',
        'value' => 'integer'
    ];


}
