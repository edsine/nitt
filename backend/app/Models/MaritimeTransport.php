<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MaritimeTransport
 * @package App\Models
 * @version December 5, 2022, 2:38 pm UTC
 *
 * @property string $year
 * @property integer $containers_count
 * @property integer $general_cargo_count
 * @property integer $bulk_cargo_count
 * @property integer $tankers_count
 * @property integer $containers_import_count
 * @property integer $containers_export_count
 * @property integer $general_cargo_tonnage
 * @property integer $bulk_cargo_tonnage
 * @property integer $accidents_recorded
 */
class MaritimeTransport extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'maritime_transport';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'year',
        'containers_count',
        'general_cargo_count',
        'bulk_cargo_count',
        'tankers_count',
        'containers_import_count',
        'containers_export_count',
        'general_cargo_tonnage',
        'bulk_cargo_tonnage',
        'accidents_recorded'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'date',
        'containers_count' => 'integer',
        'general_cargo_count' => 'integer',
        'bulk_cargo_count' => 'integer',
        'tankers_count' => 'integer',
        'containers_import_count' => 'integer',
        'containers_export_count' => 'integer',
        'general_cargo_tonnage' => 'integer',
        'bulk_cargo_tonnage' => 'integer',
        'accidents_recorded' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|unique:maritime_transport',
        'containers_count' => 'required',
        'general_cargo_count' => 'required',
        'bulk_cargo_count' => 'required',
        'tankers_count' => 'required',
        'containers_import_count' => 'required',
        'containers_export_count' => 'required',
        'general_cargo_tonnage' => 'required',
        'bulk_cargo_tonnage' => 'required',
        'accidents_recorded' => 'required'
    ];

    
}