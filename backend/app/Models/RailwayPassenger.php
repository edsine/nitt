<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RailwayPassenger
 * @package App\Models
 * @version December 5, 2022, 2:14 pm UTC
 *
 * @property string $year
 * @property integer $number_of_urban_passengers_carried
 * @property integer $number_of_regional_passengers_carried
 * @property integer $freight_carried
 * @property integer $number_of_freight_trains
 * @property integer $number_of_passenger_trains
 * @property integer $freight_revenue_generation
 * @property integer $passenger_revenue_generation
 * @property integer $passenger_fuel_consumption_rate
 * @property integer $freight_fuel_consumption_rate
 */
class RailwayPassenger extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'railway_passengers';


    // protected $dates = ['deleted_at'];



    public $fillable = [
        'year',
        'number_of_urban_passengers_carried',
        'number_of_regional_passengers_carried',
        'passengers_carried',
        'freight_carried',
        'number_of_freight_trains',
        'number_of_passenger_trains',
        'freight_revenue_generation',
        'passenger_revenue_generation',
        'passenger_fuel_consumption_rate',
        'freight_fuel_consumption_rate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'integer',
        'number_of_urban_passengers_carried' => 'float',
        'number_of_regional_passengers_carried' => 'float',
        'passengers_carried' => 'float',
        'freight_carried' => 'float',
        'number_of_freight_trains' => 'float',
        'number_of_passenger_trains' => 'float',
        'freight_revenue_generation' => 'float',
        'passenger_revenue_generation' => 'float',
        'passenger_fuel_consumption_rate' => 'float',
        'freight_fuel_consumption_rate' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer|unique:railway_passengers,year',
        'number_of_urban_passengers_carried' => 'nullable|numeric',
        'number_of_regional_passengers_carried' => 'nullable|numeric',
        'passengers_carried' => 'nullable|numeric',
        'freight_carried' => 'nullable|numeric',
        'number_of_freight_trains' => 'nullable|numeric',
        'number_of_passenger_trains' => 'nullable|numeric',
        'freight_revenue_generation' => 'nullable|numeric',
        'passenger_revenue_generation' => 'nullable|numeric',
        'passenger_fuel_consumption_rate' => 'nullable|numeric',
        'freight_fuel_consumption_rate' => 'nullable|numeric'
    ];


}
