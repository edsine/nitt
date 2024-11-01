<?php

namespace App\Repositories;

use App\Models\PassengerRoadTransportData;
use App\Repositories\BaseRepository;

/**
 * Class PassengerRoadTransportDataRepository
 * @package App\Repositories
 * @version December 1, 2022, 12:58 pm UTC
*/

class PassengerRoadTransportDataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'number_of_passengers_carried',
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
        return PassengerRoadTransportData::class;
    }
}
