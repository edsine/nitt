<?php

namespace App\Repositories;

use App\Models\RailwayPassenger;
use App\Repositories\BaseRepository;

/**
 * Class RailwayPassengerRepository
 * @package App\Repositories
 * @version December 5, 2022, 2:14 pm UTC
*/

class RailwayPassengerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'number_of_urban_passengers_carried',
        'number_of_regional_passengers_carried',
        'freight_carried',
        'number_of_freight_trains',
        'number_of_passenger_trains',
        'freight_revenue_generation',
        'passenger_revenue_generation',
        'passenger_fuel_consumption_rate',
        'freight_fuel_consumption_rate'
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
        return RailwayPassenger::class;
    }
}
