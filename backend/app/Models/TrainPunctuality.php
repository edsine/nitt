<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TrainPunctuality
 * @package App\Models
 * @version December 5, 2022, 2:23 pm UTC
 *
 * @property string $year
 * @property integer $number_of_train_delay
 * @property integer $number_of_late_arrival
 * @property integer $number_of_prompt_arrival
 */
class TrainPunctuality extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'train_punctuality';


    // protected $dates = ['deleted_at'];



    public $fillable = [
        'year',
        'number_of_train_delay',
        'number_of_late_arrival',
        'number_of_prompt_arrival'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'integer',
        'number_of_train_delay' => 'integer',
        'number_of_late_arrival' => 'integer',
        'number_of_prompt_arrival' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer|unique:train_punctuality,year',
        'number_of_train_delay' => 'required|integer',
        'number_of_late_arrival' => 'required|integer',
        'number_of_prompt_arrival' => 'required|integer'
    ];


}
