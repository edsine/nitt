<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MaritimeAcademy
 * @package App\Models
 * @version December 5, 2022, 2:08 pm UTC
 *
 * @property string $year
 * @property integer $number_of_staff
 * @property integer $number_of_admitted_students
 * @property integer $number_of_graduands
 */
class MaritimeAcademy extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'maritime_academies';


    // protected $dates = ['deleted_at'];



    public $fillable = [
        'year',
        'number_of_staff',
        'number_of_admitted_students',
        'number_of_graduands'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'integer',
        'number_of_staff' => 'integer',
        'number_of_admitted_students' => 'integer',
        'number_of_graduands' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer|unique:maritime_academies,year',
        'number_of_staff' => 'required|integer',
        'number_of_admitted_students' => 'required|integer',
        'number_of_graduands' => 'required|integer'
    ];


}
