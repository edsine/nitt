<?php

namespace App\Repositories;

use App\Models\FleetAccident;
use App\Repositories\BaseRepository;

/**
 * Class FleetAccidentRepository
 * @package App\Repositories
 * @version March 18, 2024, 2:11 pm UTC
*/

class FleetAccidentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'transport_company',
        'vehicle',
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
        return FleetAccident::class;
    }
}
