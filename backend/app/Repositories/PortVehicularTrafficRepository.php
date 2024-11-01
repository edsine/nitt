<?php

namespace App\Repositories;

use App\Models\PortVehicularTraffic;
use App\Repositories\BaseRepository;

/**
 * Class PortVehicularTrafficRepository
 * @package App\Repositories
 * @version March 18, 2024, 12:07 pm UTC
*/

class PortVehicularTrafficRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'port',
        'traffic',
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
        return PortVehicularTraffic::class;
    }
}
