<?php

namespace App\Repositories;

use App\Models\RouteRoadCrash;
use App\Repositories\BaseRepository;

/**
 * Class RouteRoadCrashRepository
 * @package App\Repositories
 * @version March 18, 2024, 12:28 pm UTC
*/

class RouteRoadCrashRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'route',
        'number_of_crashes',
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
        return RouteRoadCrash::class;
    }
}
