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
        'transportation_and_storage' => 'integer',
        'road_transport' => 'integer',
        'rail_transport_and_pipelines' => 'integer',
        'water_transport' => 'integer',
        'air_transport' => 'integer',
        'transport_services' => 'integer',
        'post_and_courier_services' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
