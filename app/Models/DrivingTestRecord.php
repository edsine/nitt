<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DrivingTestRecord
 * @package App\Models
 * @version March 18, 2024, 2:08 pm UTC
 *
 * @property string $state
 * @property integer $year
 * @property integer $renewal_count
 * @property integer $fresh_count
 * @property integer $3y_count
 * @property integer $5y_count
 * @property integer $failure
 * @property integer $collected
 * @property integer $due_for
 * @property integer $lp
 * @property integer $total_captured
 */
class DrivingTestRecord extends Model
{

    use HasFactory;

    public $table = 'driving_test_records';




    public $fillable = [
        'state',
        'year',
        'renewal_count',
        'fresh_count',
        '3y_count',
        '5y_count',
        'failure',
        'collected',
        'due_for',
        'lp',
        'total_captured'
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
        'renewal_count' => 'integer',
        'fresh_count' => 'integer',
        '3y_count' => 'integer',
        '5y_count' => 'integer',
        'failure' => 'integer',
        'collected' => 'integer',
        'due_for' => 'integer',
        'lp' => 'integer',
        'total_captured' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer',
        'state' => 'required|string|unique:driving_test_records,year,state',
        'renewal_count' => 'nullable|integer',
        'fresh_count' => 'nullable|integer',
        '3y_count' => 'nullable|integer',
        '5y_count' => 'nullable|integer',
        'failure' => 'nullable|integer',
        'collected' => 'nullable|integer',
        'due_for' => 'nullable|integer',
        'lp' => 'nullable|integer',
        'total_captured' => 'nullable|integer'
    ];


}
