<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CorporationPassengerTraffic
 * @package App\Models
 * @version March 18, 2024, 2:12 pm UTC
 *
 * @property string $source
 * @property string $destination
 * @property integer $year
 * @property integer $count
 */
class CorporationPassengerTraffic extends Model
{

    use HasFactory;

    public $table = 'corporation_passenger_traffics';




    public $fillable = [
        'source',
        'destination',
        'year',
        'count'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'source' => 'string',
        'destination' => 'string',
        'year' => 'integer',
        'count' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'destination' => 'nullable|string',
        'count' => 'nullable|integer',
        'year' => 'required|integer',
        'source' => 'required|string|unique:corporation_passenger_traffics,year,source',
    ];


}
