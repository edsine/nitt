<?php

namespace App\Repositories;

use App\Models\TrafficOffence;
use App\Repositories\BaseRepository;

/**
 * Class TrafficOffenceRepository
 * @package App\Repositories
 * @version March 18, 2024, 1:16 pm UTC
*/

class TrafficOffenceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'offence',
        'year',
        'state',
        'count'
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
        return TrafficOffence::class;
    }
}
