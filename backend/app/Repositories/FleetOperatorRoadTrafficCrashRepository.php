<?php

namespace App\Repositories;

use App\Models\FleetOperatorRoadTrafficCrash;
use App\Repositories\BaseRepository;

/**
 * Class FleetOperatorRoadTrafficCrashRepository
 * @package App\Repositories
 * @version March 18, 2024, 11:09 am UTC
*/

class FleetOperatorRoadTrafficCrashRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fleet_operator',
        'number_of_cases',
        'number_killed',
        'number_injured',
        'number_of_persons'
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
        return FleetOperatorRoadTrafficCrash::class;
    }
}
