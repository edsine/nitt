<?php

namespace App\Repositories;

use App\Models\ShipTrafficGRT;
use App\Repositories\BaseRepository;

/**
 * Class ShipTrafficGRTRepository
 * @package App\Repositories
 * @version March 18, 2024, 12:05 pm UTC
*/

class ShipTrafficGRTRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'number_of_vessels',
        'grt',
        'port'
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
        return ShipTrafficGRT::class;
    }
}
