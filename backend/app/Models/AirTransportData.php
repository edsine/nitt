<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AirTransportData
 * @package App\Models
 * @version December 1, 2022, 2:48 pm UTC
 *
 * @property string $year
 * @property integer $number_of_domestic_registered_airlines
 * @property integer $number_of_international_registered_airlines
 * @property integer $number_of_domestic_deregistered_airlines
 * @property integer $number_of_international_deregistered_airlines
 * @property integer $number_of_near_accidents
 * @property integer $number_of_accidents
 */
class AirTransportData extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'air_transport_data';


    // protected $dates = ['deleted_at'];



    public $fillable = [
        'year',
        'number_of_domestic_registered_airlines',
        'number_of_international_registered_airlines',
        'number_of_domestic_deregistered_airlines',
        'number_of_international_deregistered_airlines',
        'number_of_near_accidents',
        'number_of_accidents'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'integer',
        'number_of_domestic_registered_airlines' => 'integer',
        'number_of_international_registered_airlines' => 'integer',
        'number_of_domestic_deregistered_airlines' => 'integer',
        'number_of_international_deregistered_airlines' => 'integer',
        'number_of_near_accidents' => 'integer',
        'number_of_accidents' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer|unique:air_transport_data,year',
        'number_of_domestic_registered_airlines' => 'required|integer',
        'number_of_international_registered_airlines' => 'required|integer',
        'number_of_domestic_deregistered_airlines' => 'required|integer',
        'number_of_international_deregistered_airlines' => 'required|integer',
        'number_of_near_accidents' => 'required|integer',
        'number_of_accidents' => 'required|integer'
    ];


}
