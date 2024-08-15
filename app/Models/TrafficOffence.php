<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TrafficOffence
 * @package App\Models
 * @version March 18, 2024, 1:16 pm UTC
 *
 * @property string $offence
 * @property integer $year
 * @property string $state
 * @property integer $count
 */
class TrafficOffence extends Model
{

    use HasFactory;

    public $table = 'traffic_offences';




    public $fillable = [
        'offence',
        'year',
        'state',
        'count'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'offence' => 'string',
        'year' => 'integer',
        'state' => 'string',
        'count' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer',
        'state' => 'required|string|unique:traffic_offences,year,state',
        'offence' => 'required|string',
        'count' => 'nullable|integer'
    ];


}
