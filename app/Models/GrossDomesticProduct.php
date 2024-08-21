<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class GrossDomesticProduct
 * @package App\Models
 * @version March 18, 2024, 10:48 am UTC
 *
 * @property integer $year
 * @property integer $transportation_and_storage
 * @property integer $road_transport
 * @property integer $rail_transport_and_pipelines
 * @property integer $water_transport
 * @property integer $air_transport
 * @property integer $transport_services
 * @property integer $post_and_courier_services
 */
class GrossDomesticProduct extends Model
{

    use HasFactory;

    public $table = 'gross_domestic_products';




    public $fillable = [
        'year',
        'transportation_and_storage',
        'road_transport',
        'rail_transport_and_pipelines',
        'water_transport',
        'air_transport',
        'transport_services',
        'post_and_courier_services'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'integer',
        'transportation_and_storage' => 'float',
        'road_transport' => 'float',
        'rail_transport_and_pipelines' => 'float',
        'water_transport' => 'float',
        'air_transport' => 'float',
        'transport_services' => 'float',
        'post_and_courier_services' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required|integer|unique:gross_domestic_products,year',
        'transportation_and_storage' => 'nullable|numeric',
        'road_transport' => 'nullable|numeric',
        'rail_transport_and_pipelines' => 'nullable|numeric',
        'water_transport' => 'nullable|numeric',
        'air_transport' => 'nullable|numeric',
        'transport_services' => 'nullable|numeric',
        'post_and_courier_services' => 'nullable|numeric'
    ];


}
