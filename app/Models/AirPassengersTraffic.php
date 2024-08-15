<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AirPassengersTraffic
 * @package App\Models
 * @version December 1, 2022, 2:55 pm UTC
 *
 * @property integer $domestic_passengers_traffic
 * @property integer $international_passengers_traffic
 * @property integer $domestic_freight_traffic
 * @property integer $international_freight_traffic
 * @property string $year
 */
class AirPassengersTraffic extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'air_passengers_traffic';


    // protected $dates = ['deleted_at'];



    public $fillable = [
        'domestic_passengers_traffic',
        'international_passengers_traffic',
        'domestic_freight_traffic',
        'international_freight_traffic',
        'year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'domestic_passengers_traffic' => 'integer',
        'international_passengers_traffic' => 'integer',
        'domestic_freight_traffic' => 'integer',
        'international_freight_traffic' => 'integer',
        'year' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'domestic_passengers_traffic' => 'required|integer',
        'international_passengers_traffic' => 'required|integer',
        'domestic_freight_traffic' => 'required|integer',
        'international_freight_traffic' => 'required|integer',
        'year' => 'required|integer|unique:air_passengers_traffic,year'
    ];


}
