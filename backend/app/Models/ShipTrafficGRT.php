<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ShipTrafficGRT
 * @package App\Models
 * @version March 18, 2024, 12:05 pm UTC
 *
 * @property integer $year
 * @property integer $number_of_vessels
 * @property integer $grt
 * @property string $port
 */
class ShipTrafficGRT extends Model
{

    use HasFactory;

    public $table = 'ship_traffic_g_r_ts';




    public $fillable = [
        'year',
        'number_of_vessels',
        'grt',
        'port'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'integer',
        'number_of_vessels' => 'integer',
        'grt' => 'integer',
        'port' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'integer',
        'port' => 'required|string|unique:ship_traffic_g_r_ts,year,port',
        'number_of_vessels' => 'nullable|integer',
        'grt' => 'nullable|integer',
    ];


}
