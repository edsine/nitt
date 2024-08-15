<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RailwaySafety
 * @package App\Models
 * @version December 5, 2022, 2:20 pm UTC
 *
 * @property string $year
 * @property integer $number_of_near_accidents
 * @property integer $number_of_accidents
 */
class RailwaySafety extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'railway_safety';


    // protected $dates = ['deleted_at'];



    public $fillable = [
        'year',
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
        'number_of_near_accidents' => 'integer',
        'number_of_accidents' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer|unique:railway_safety,year',
        'number_of_near_accidents' => 'required|integer',
        'number_of_accidents' => 'required|integer'
    ];


}
