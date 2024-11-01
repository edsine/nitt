<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class LicenseRenewal
 * @package App\Models
 * @version March 18, 2024, 1:24 pm UTC
 *
 * @property integer $year
 * @property integer $car
 * @property integer $van
 * @property integer $lorry
 * @property integer $mini_bus
 * @property integer $big_bus
 * @property integer $tanker
 * @property integer $trailer
 * @property integer $tipper
 * @property integer $tractor
 * @property string $state
 */
class LicenseRenewal extends Model
{

    use HasFactory;

    public $table = 'license_renewals';




    public $fillable = [
        'year',
        'car',
        'van',
        'lorry',
        'mini_bus',
        'big_bus',
        'tanker',
        'trailer',
        'tipper',
        'tractor',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'integer',
        'car' => 'integer',
        'van' => 'integer',
        'lorry' => 'integer',
        'mini_bus' => 'integer',
        'big_bus' => 'integer',
        'tanker' => 'integer',
        'trailer' => 'integer',
        'tipper' => 'integer',
        'tractor' => 'integer',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer',
        'state' => 'required|string|unique:license_renewals,year,state',
        'car' => 'nullable|integer',
        'van' => 'nullable|integer',
        'lorry' => 'nullable|integer',
        'mini_bus' => 'nullable|integer',
        'big_bus' => 'nullable|integer',
        'tanker' => 'nullable|integer',
        'trailer' => 'nullable|integer',
        'tipper' => 'nullable|integer',
        'tractor' => 'nullable|integer',
    ];


}
