<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MaritimeAdministration
 * @package App\Models
 * @version December 5, 2022, 2:28 pm UTC
 *
 * @property string $year
 * @property integer $nigerian_sea_fearers_count
 * @property integer $foreign_sea_fearers_count
 * @property integer $number_of_vessels_registered
 * @property integer $number_of_ships_cabotage
 * @property integer $number_of_accidents
 * @property integer $number_of_piracy_attacks
 */
class MaritimeAdministration extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'maritime_administration';


    // protected $dates = ['deleted_at'];



    public $fillable = [
        'year',
        'nigerian_sea_fearers_count',
        'foreign_sea_fearers_count',
        'number_of_vessels_registered',
        'number_of_ships_cabotage',
        'number_of_accidents',
        'number_of_piracy_attacks'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'integer',
        'nigerian_sea_fearers_count' => 'integer',
        'foreign_sea_fearers_count' => 'integer',
        'number_of_vessels_registered' => 'integer',
        'number_of_ships_cabotage' => 'integer',
        'number_of_accidents' => 'integer',
        'number_of_piracy_attacks' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer|unique:maritime_administration,year',
        'nigerian_sea_fearers_count' => 'required|integer',
        'foreign_sea_fearers_count' => 'required|integer',
        'number_of_vessels_registered' => 'required|integer',
        'number_of_ships_cabotage' => 'required|integer',
        'number_of_accidents' => 'required|integer',
        'number_of_piracy_attacks' => 'required|integer'
    ];


}
