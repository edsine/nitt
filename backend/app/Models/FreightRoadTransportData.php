<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FreightRoadTransportData
 * @package App\Models
 * @version December 1, 2022, 2:02 pm UTC
 *
 * @property integer $number_of_tonnes_carried
 * @property string $year
 * @property integer $number_of_vehicles_in_fleet
 * @property integer $revenue_from_operation
 * @property integer $number_of_employees
 * @property integer $annual_cost_of_vehicle_maintenance
 * @property integer $number_of_accidents
 */
class FreightRoadTransportData extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'freight_road_transport_data';


    // protected $dates = ['deleted_at'];



    public $fillable = [
        'number_of_tonnes_carried',
        'year',
        'number_of_vehicles_in_fleet',
        'revenue_from_operation',
        'number_of_employees',
        'annual_cost_of_vehicle_maintenance',
        'number_of_accidents'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'number_of_tonnes_carried' => 'integer',
        'year' => 'integer',
        'number_of_vehicles_in_fleet' => 'integer',
        'revenue_from_operation' => 'integer',
        'number_of_employees' => 'integer',
        'annual_cost_of_vehicle_maintenance' => 'integer',
        'number_of_accidents' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer|unique:freight_road_transport_data,year',
        'number_of_tonnes_carried' => 'required|integer',
        'number_of_vehicles_in_fleet' => 'required|integer',
        'revenue_from_operation' => 'required|integer',
        'number_of_employees' => 'required|integer',
        'annual_cost_of_vehicle_maintenance' => 'required|integer',
        'number_of_accidents' => 'required|integer'
    ];


}
