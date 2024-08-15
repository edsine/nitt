<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FleetOperatorBrand
 * @package App\Models
 * @version March 18, 2024, 2:17 pm UTC
 *
 * @property integer $year
 * @property integer $state
 * @property integer $toyota_count
 * @property integer $mercedes_count
 * @property integer $nissan_count
 * @property integer $peugeot_count
 * @property integer $volkswagen_count
 * @property integer $sharon_count
 */
class FleetOperatorBrand extends Model
{

    use HasFactory;

    public $table = 'fleet_operator_brands';




    public $fillable = [
        'year',
        'state',
        'toyota_count',
        'mercedes_count',
        'nissan_count',
        'peugeot_count',
        'volkswagen_count',
        'sharon_count'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'integer',
        'state' => 'integer',
        'toyota_count' => 'integer',
        'mercedes_count' => 'integer',
        'nissan_count' => 'integer',
        'peugeot_count' => 'integer',
        'volkswagen_count' => 'integer',
        'sharon_count' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer',
        'state' => 'required|string|unique:fleet_operator_brands,year,state',
        'toyota_count' => 'integer',
        'mercedes_count' => 'integer',
        'nissan_count' => 'integer',
        'peugeot_count' => 'integer',
        'volkswagen_count' => 'integer',
        'sharon_count' => 'integer'
    ];


}
