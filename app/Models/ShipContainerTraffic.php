<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ShipContainerTraffic
 * @package App\Models
 * @version March 18, 2024, 10:59 am UTC
 *
 * @property integer $year
 * @property integer $ship_traffic
 * @property integer $container_traffic
 * @property integer $cargo_throughput
 */
class ShipContainerTraffic extends Model
{

    use HasFactory;

    public $table = 'ship_container_traffics';




    public $fillable = [
        'year',
        'ship_traffic',
        'container_traffic',
        'cargo_throughput'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'integer',
        'ship_traffic' => 'float',
        'container_traffic' => 'float',
        'cargo_throughput' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer|unique:ship_container_traffics,year',
        'ship_traffic' => 'nullable|numeric',
        'container_traffic' => 'nullable|numeric',
        'cargo_throughput' => 'nullable|numeric'
    ];


}
