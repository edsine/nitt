<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FleetSizeComposition
 * @package App\Models
 * @version March 18, 2024, 2:15 pm UTC
 *
 * @property string $state
 * @property integer $year
 * @property integer $4pc
 * @property integer $7pc
 * @property integer $10pc
 * @property integer $14pc
 * @property integer $18pc
 * @property integer $coaster
 * @property integer $big_bus
 */
class FleetSizeComposition extends Model
{

    use HasFactory;

    public $table = 'fleet_size_compositions';




    public $fillable = [
        'state',
        'year',
        '4pc',
        '7pc',
        '10pc',
        '14pc',
        '18pc',
        'coaster',
        'big_bus'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'state' => 'string',
        'year' => 'integer',
        '4pc' => 'integer',
        '7pc' => 'integer',
        '10pc' => 'integer',
        '14pc' => 'integer',
        '18pc' => 'integer',
        'coaster' => 'integer',
        'big_bus' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer',
        'state' => 'required|string|unique:fleet_size_compositions,year,state',
        '4pc' => 'nullable|integer',
        '7pc' => 'nullable|integer',
        '10pc' => 'nullable|integer',
        '14pc' => 'nullable|integer',
        '18pc' => 'nullable|integer',
        'coaster' => 'nullable|integer',
        'big_bus' => 'nullable|integer'
    ];


}
