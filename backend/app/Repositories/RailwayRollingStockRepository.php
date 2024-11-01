<?php

namespace App\Repositories;

use App\Models\RailwayRollingStock;
use App\Repositories\BaseRepository;

/**
 * Class RailwayRollingStockRepository
 * @package App\Repositories
 * @version December 5, 2022, 2:18 pm UTC
*/

class RailwayRollingStockRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number_of_coaches_rolling_stock',
        'number_of_wagon_rolling_stock',
        'average_loco_availability',
        'average_coaches_maintenance_cost',
        'average_wagon_maintenance_cost',
        'annual_average_km_travel_coaches',
        'annual_average_km_travel_wagon',
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
        return RailwayRollingStock::class;
    }
}
