<?php

namespace App\Repositories;

use App\Models\RailwaySafety;
use App\Repositories\BaseRepository;

/**
 * Class RailwaySafetyRepository
 * @package App\Repositories
 * @version December 5, 2022, 2:20 pm UTC
*/

class RailwaySafetyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'number_of_near_accidents',
        'number_of_accidents'
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
        return RailwaySafety::class;
    }
}
