<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FleetAccident
 * @package App\Models
 * @version March 18, 2024, 2:11 pm UTC
 *
 * @property integer $year
 * @property string $transport_company
 * @property integer $vehicle
 * @property integer $number_of_accidents
 */
class FleetAccident extends Model
{

    use HasFactory;

    public $table = 'fleet_accidents';




    public $fillable = [
        'year',
        'transport_company',
        'vehicle',
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
        'transport_company' => 'string',
        'vehicle' => 'integer',
        'number_of_accidents' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer|unique:fleet_accidents,year',
        'transport_company' => 'nullable|string',
        'vehicle' => 'nullable|integer',
        'number_of_accidents' => 'nullable|integer'
    ];


}
