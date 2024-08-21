<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RailwayRollingStock
 * @package App\Models
 * @version December 5, 2022, 2:18 pm UTC
 *
 * @property integer $number_of_coaches_rolling_stock
 * @property integer $number_of_wagon_rolling_stock
 * @property integer $average_loco_availability
 * @property integer $average_coaches_maintenance_cost
 * @property integer $average_wagon_maintenance_cost
 * @property integer $annual_average_km_travel_coaches
 * @property integer $annual_average_km_travel_wagon
 * @property string $year
 */
class RailwayRollingStock extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'railway_rolling_stocks';


    // protected $dates = ['deleted_at'];



    public $fillable = [
        'number_of_coaches_rolling_stock',
        'number_of_wagon_rolling_stock',
        'average_loco_availability',
        'average_coaches_maintenance_cost',
        'average_wagon_maintenance_cost',
        'annual_average_km_travel_coaches',
        'annual_average_km_travel_wagon',
        'year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'number_of_coaches_rolling_stock' => 'integer',
        'number_of_wagon_rolling_stock' => 'integer',
        'average_loco_availability' => 'integer',
        'average_coaches_maintenance_cost' => 'integer',
        'average_wagon_maintenance_cost' => 'integer',
        'annual_average_km_travel_coaches' => 'integer',
        'annual_average_km_travel_wagon' => 'integer',
        'year' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'number_of_coaches_rolling_stock' => 'required|integer',
        'number_of_wagon_rolling_stock' => 'required|integer',
        'average_loco_availability' => 'required|integer',
        'average_coaches_maintenance_cost' => 'required|integer',
        'average_wagon_maintenance_cost' => 'required|integer',
        'annual_average_km_travel_coaches' => 'required|integer',
        'annual_average_km_travel_wagon' => 'required|integer',
        'year' => 'required|integer|unique:railway_rolling_stocks,year'
    ];


}
