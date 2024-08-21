<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AirModeData
 * @package App\Models
 * @version March 19, 2024, 11:18 am UTC
 *
 * @property string $airport
 * @property integer $year
 * @property integer $domestic_passengers_traffic
 * @property integer $international_passengers_traffic
 * @property integer $aircraft_traffic_domestic
 * @property integer $aircraft_traffic_international
 * @property integer $cargo_traffic_domestic
 * @property integer $cargo_traffic_international
 * @property integer $mail_traffic_domestic
 * @property integer $mail_traffic_international
 */
class AirModeData extends Model
{

    use HasFactory;

    public $table = 'air_mode_data';




    public $fillable = [
        'airport',
        'year',
        'domestic_passengers_traffic',
        'international_passengers_traffic',
        'aircraft_traffic_domestic',
        'aircraft_traffic_international',
        'cargo_traffic_domestic',
        'cargo_traffic_international',
        'mail_traffic_domestic',
        'mail_traffic_international'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'airport' => 'string',
        'year' => 'integer',
        'domestic_passengers_traffic' => 'integer',
        'international_passengers_traffic' => 'integer',
        'aircraft_traffic_domestic' => 'integer',
        'aircraft_traffic_international' => 'integer',
        'cargo_traffic_domestic' => 'integer',
        'cargo_traffic_international' => 'integer',
        'mail_traffic_domestic' => 'integer',
        'mail_traffic_international' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'airport' => 'string',
        'year' => 'required|integer|unique:air_mode_data,year',
        'domestic_passengers_traffic' => 'nullable|integer',
        'international_passengers_traffic' => 'nullable|integer',
        'aircraft_traffic_domestic' => 'nullable|integer',
        'aircraft_traffic_international' => 'nullable|integer',
        'cargo_traffic_domestic' => 'nullable|integer',
        'cargo_traffic_international' => 'nullable|integer',
        'mail_traffic_domestic' => 'nullable|integer',
        'mail_traffic_international' => 'nullable|integer'
    ];


}
