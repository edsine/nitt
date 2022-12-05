<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class VehicleImportation
 * @package App\Models
 * @version December 5, 2022, 2:30 pm UTC
 *
 * @property string $year
 * @property integer $vehicle_category
 * @property integer $new_vehicle_count
 * @property integer $used_vehicle_count
 */
class VehicleImportation extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'vehicle_importation';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'year',
        'vehicle_category',
        'new_vehicle_count',
        'used_vehicle_count'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'date',
        'vehicle_category' => 'integer',
        'new_vehicle_count' => 'integer',
        'used_vehicle_count' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|unique:vehicle_importation',
        'vehicle_category' => 'required',
        'new_vehicle_count' => 'required',
        'used_vehicle_count' => 'required'
    ];

    
}
