<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FleetOperatorRoadTrafficCrash
 * @package App\Models
 * @version March 18, 2024, 11:09 am UTC
 *
 * @property string $fleet_operator
 * @property integer $number_of_cases
 * @property integer $number_killed
 * @property integer $number_injured
 * @property integer $number_of_persons
 */
class FleetOperatorRoadTrafficCrash extends Model
{

    use HasFactory;

    public $table = 'fleet_operator_road_traffic_crashes';




    public $fillable = [
        'fleet_operator',
        'number_of_cases',
        'number_killed',
        'number_injured',
        'number_of_persons'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fleet_operator' => 'string',
        'number_of_cases' => 'integer',
        'number_killed' => 'integer',
        'number_injured' => 'integer',
        'number_of_persons' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fleet_operator' => 'required|string|unique:fleet_operator_road_traffic_crashes,fleet_operator',
        'number_of_cases' => 'nullable|integer',
        'number_killed' => 'nullable|integer',
        'number_injured' => 'nullable|integer',
        'number_of_persons' => 'nullable|integer'
    ];


}
