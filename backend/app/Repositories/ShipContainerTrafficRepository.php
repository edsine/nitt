<?php

namespace App\Repositories;

use App\Models\ShipContainerTraffic;
use App\Repositories\BaseRepository;

/**
 * Class ShipContainerTrafficRepository
 * @package App\Repositories
 * @version March 18, 2024, 10:59 am UTC
*/

class ShipContainerTrafficRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'ship_traffic',
        'container_traffic',
        'cargo_throughput'
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
        return ShipContainerTraffic::class;
    }
}
