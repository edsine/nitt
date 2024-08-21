<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RouteRoadCrash
 * @package App\Models
 * @version March 18, 2024, 12:28 pm UTC
 *
 * @property string $route
 * @property integer $number_of_crashes
 * @property integer $year
 */
class RouteRoadCrash extends Model
{

    use HasFactory;

    public $table = 'route_road_crashes';




    public $fillable = [
        'route',
        'number_of_crashes',
        'year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'route' => 'string',
        'number_of_crashes' => 'integer',
        'year' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer',
        'route' => 'required|string|unique:route_road_crashes,year,route',
        'number_of_crashes' => 'nullable|integer',
    ];


}
