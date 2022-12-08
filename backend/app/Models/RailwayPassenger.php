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
    use SoftDeletes;

    use HasFactory;

    public $table = 'railway_passengers';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'year',
        'number_of_urban_passengers_carried',
        'number_of_regional_passengers_carried',
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
        'year' => 'date',
        'number_of_urban_passengers_carried' => 'integer',
        'number_of_regional_passengers_carried' => 'integer',
        'freight_carried' => 'integer',
        'number_of_freight_trains' => 'integer',
        'number_of_passenger_trains' => 'integer',
        'freight_revenue_generation' => 'integer',
        'passenger_revenue_generation' => 'integer',
        'passenger_fuel_consumption_rate' => 'integer',
        'freight_fuel_consumption_rate' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|date|unique:railway_passengers,year',
        'number_of_urban_passengers_carried' => 'required|integer',
        'number_of_regional_passengers_carried' => 'required|integer',
        'freight_carried' => 'required|integer',
        'number_of_freight_trains' => 'required|integer',
        'number_of_passenger_trains' => 'required|integer',
        'freight_revenue_generation' => 'required|integer',
        'passenger_revenue_generation' => 'required|integer',
        'passenger_fuel_consumption_rate' => 'required|integer',
        'freight_fuel_consumption_rate' => 'required|integer'
    ];


}
