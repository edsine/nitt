<?php

namespace App\Repositories;

use App\Models\CorporationPassengerTraffic;
use App\Repositories\BaseRepository;

/**
 * Class CorporationPassengerTrafficRepository
 * @package App\Repositories
 * @version March 18, 2024, 2:12 pm UTC
*/

class CorporationPassengerTrafficRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'source',
        'destination',
        'year',
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
        return CorporationPassengerTraffic::class;
    }
}
