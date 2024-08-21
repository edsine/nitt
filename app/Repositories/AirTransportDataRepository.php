<?php

namespace App\Repositories;

use App\Models\AirTransportData;
use App\Repositories\BaseRepository;

/**
 * Class AirTransportDataRepository
 * @package App\Repositories
 * @version December 1, 2022, 2:48 pm UTC
*/

class AirTransportDataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'number_of_domestic_registered_airlines',
        'number_of_international_registered_airlines',
        'number_of_domestic_deregistered_airlines',
        'number_of_international_deregistered_airlines',
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
        return AirTransportData::class;
    }
}
