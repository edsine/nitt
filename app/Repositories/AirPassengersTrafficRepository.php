<?php

namespace App\Repositories;

use App\Models\AirPassengersTraffic;
use App\Repositories\BaseRepository;

/**
 * Class AirPassengersTrafficRepository
 * @package App\Repositories
 * @version December 1, 2022, 2:55 pm UTC
*/

class AirPassengersTrafficRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'domestic_passengers_traffic',
        'international_passengers_traffic',
        'domestic_freight_traffic',
        'international_freight_traffic',
        'year'
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
        return AirPassengersTraffic::class;
    }
}
