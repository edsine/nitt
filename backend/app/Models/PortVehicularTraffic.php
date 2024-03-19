<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PortVehicularTraffic
 * @package App\Models
 * @version March 18, 2024, 12:07 pm UTC
 *
 * @property string $port
 * @property integer $traffic
 * @property integer $year
 */
class PortVehicularTraffic extends Model
{

    use HasFactory;

    public $table = 'port_vehicular_traffics';




    public $fillable = [
        'port',
        'traffic',
        'year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'port' => 'string',
        'traffic' => 'integer',
        'year' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer',
        'port' => 'required|string|unique:port_vehicular_traffics,year,port',
        'traffic' => 'nullable|integer',
    ];


}
