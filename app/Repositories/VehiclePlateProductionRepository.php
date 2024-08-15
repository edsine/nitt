<?php

namespace App\Repositories;

use App\Models\VehiclePlateProduction;
use App\Repositories\BaseRepository;

/**
 * Class VehiclePlateProductionRepository
 * @package App\Repositories
 * @version March 18, 2024, 12:30 pm UTC
*/

class VehiclePlateProductionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'vehicle_category',
        'year',
        'value'
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
        return VehiclePlateProduction::class;
    }
}
