<?php

namespace App\Repositories;

use App\Models\FreightRoadTransportData;
use App\Repositories\BaseRepository;

/**
 * Class FreightRoadTransportDataRepository
 * @package App\Repositories
 * @version December 1, 2022, 2:02 pm UTC
*/

class FreightRoadTransportDataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number_of_tonnes_carried',
        'year',
        'number_of_vehicles_in_fleet',
        'revenue_from_operation',
        'number_of_employees',
        'annual_cost_of_vehicle_maintenance',
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
        return FreightRoadTransportData::class;
    }
}
