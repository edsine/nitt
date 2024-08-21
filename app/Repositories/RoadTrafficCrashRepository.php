<?php

namespace App\Repositories;

use App\Models\RoadTrafficCrash;
use App\Repositories\BaseRepository;

/**
 * Class RoadTrafficCrashRepository
 * @package App\Repositories
 * @version March 18, 2024, 11:05 am UTC
*/

class RoadTrafficCrashRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fatal_cases',
        'serious_cases',
        'minor_cases',
        'total_cases',
        'persons_injured',
        'total_casualty',
        'year',
        'persons_killed'
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
        return RoadTrafficCrash::class;
    }
}
