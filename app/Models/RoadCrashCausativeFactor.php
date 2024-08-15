<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RoadCrashCausativeFactor
 * @package App\Models
 * @version March 18, 2024, 12:43 pm UTC
 *
 * @property string $state
 * @property integer $speed_violation
 * @property integer $lost_control
 * @property integer $dangerous_driving
 * @property integer $tyre_burst
 * @property integer $brake_failure
 * @property integer $wrongful_overtaking
 * @property integer $route_violation
 * @property integer $mechanically_deficient_vehicle
 * @property integer $bad_road
 * @property integer $road_obstruction_violation
 * @property integer $dangerous_overtaking
 * @property integer $overloading
 * @property integer $sleeping_on_steering
 * @property integer $driving_under_alcohol_drug
 * @property integer $use_of_phone_driving
 * @property integer $night_journey
 * @property integer $fatigue
 * @property integer $poor_weather
 * @property integer $sign_light_violation
 * @property integer $others
 */
class RoadCrashCausativeFactor extends Model
{

    use HasFactory;

    public $table = 'road_crash_causative_factors';




    public $fillable = [
        'state',
        'speed_violation',
        'lost_control',
        'dangerous_driving',
        'tyre_burst',
        'brake_failure',
        'wrongful_overtaking',
        'route_violation',
        'mechanically_deficient_vehicle',
        'bad_road',
        'road_obstruction_violation',
        'dangerous_overtaking',
        'overloading',
        'sleeping_on_steering',
        'driving_under_alcohol_drug',
        'use_of_phone_driving',
        'night_journey',
        'fatigue',
        'poor_weather',
        'sign_light_violation',
        'others'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'state' => 'string',
        'speed_violation' => 'integer',
        'lost_control' => 'integer',
        'dangerous_driving' => 'integer',
        'tyre_burst' => 'integer',
        'brake_failure' => 'integer',
        'wrongful_overtaking' => 'integer',
        'route_violation' => 'integer',
        'mechanically_deficient_vehicle' => 'integer',
        'bad_road' => 'integer',
        'road_obstruction_violation' => 'integer',
        'dangerous_overtaking' => 'integer',
        'overloading' => 'integer',
        'sleeping_on_steering' => 'integer',
        'driving_under_alcohol_drug' => 'integer',
        'use_of_phone_driving' => 'integer',
        'night_journey' => 'integer',
        'fatigue' => 'integer',
        'poor_weather' => 'integer',
        'sign_light_violation' => 'integer',
        'others' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'state' => 'required|string|unique:road_crash_causative_factors,state',
        'speed_violation' => 'nullable|integer',
        'lost_control' => 'nullable|integer',
        'dangerous_driving' => 'nullable|integer',
        'tyre_burst' => 'nullable|integer',
        'brake_failure' => 'nullable|integer',
        'wrongful_overtaking' => 'nullable|integer',
        'route_violation' => 'nullable|integer',
        'mechanically_deficient_vehicle' => 'nullable|integer',
        'bad_road' => 'nullable|integer',
        'road_obstruction_violation' => 'nullable|integer',
        'dangerous_overtaking' => 'nullable|integer',
        'overloading' => 'nullable|integer',
        'sleeping_on_steering' => 'nullable|integer',
        'driving_under_alcohol_drug' => 'nullable|integer',
        'use_of_phone_driving' => 'nullable|integer',
        'night_journey' => 'nullable|integer',
        'fatigue' => 'nullable|integer',
        'poor_weather' => 'nullable|integer',
        'sign_light_violation' => 'nullable|integer',
        'others' => 'nullable|integer'
    ];


}
