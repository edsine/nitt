<?php

namespace App\Repositories;

use App\Models\GrossDomesticProduct;
use App\Repositories\BaseRepository;

/**
 * Class GrossDomesticProductRepository
 * @package App\Repositories
 * @version March 18, 2024, 10:48 am UTC
*/

class GrossDomesticProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return GrossDomesticProduct::class;
    }
}
