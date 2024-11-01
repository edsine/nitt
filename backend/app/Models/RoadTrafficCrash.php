<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RoadTrafficCrash
 * @package App\Models
 * @version March 18, 2024, 11:05 am UTC
 *
 * @property integer $fatal_cases
 * @property integer $serious_cases
 * @property integer $minor_cases
 * @property integer $total_cases
 * @property integer $persons_injured
 * @property integer $total_casualty
 * @property integer $year
 * @property integer $persons_killed
 */
class RoadTrafficCrash extends Model
{

    use HasFactory;

    public $table = 'road_traffic_crashes';




    public $fillable = [
        'fatal_cases',
        'serious_cases',
        'minor_cases',
        'total_cases',
        'persons_injured',
        'total_casualty',
        'year',
        'persons_killed'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fatal_cases' => 'integer',
        'serious_cases' => 'integer',
        'minor_cases' => 'integer',
        'total_cases' => 'integer',
        'persons_injured' => 'integer',
        'total_casualty' => 'integer',
        'year' => 'integer',
        'persons_killed' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fatal_cases' => 'nullable|integer',
        'serious_cases' => 'nullable|integer',
        'minor_cases' => 'nullable|integer',
        'total_cases' => 'nullable|integer',
        'persons_injured' => 'nullable|integer',
        'total_casualty' => 'nullable|integer',
        'year' => 'required|integer|unique:road_traffic_crashes,year',
        'persons_killed' => 'nullable|integer'
    ];


}
