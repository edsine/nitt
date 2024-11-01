<?php

namespace App\Repositories;

use App\Models\AirModeData;
use App\Repositories\BaseRepository;

/**
 * Class AirModeDataRepository
 * @package App\Repositories
 * @version March 19, 2024, 11:18 am UTC
*/

class AirModeDataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'airport',
        'year',
        'domestic_passengers_traffic',
        'international_passengers_traffic',
        'aircraft_traffic_domestic',
        'aircraft_traffic_international',
        'cargo_traffic_domestic',
        'cargo_traffic_international',
        'mail_traffic_domestic',
        'mail_traffic_international'
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
        return AirModeData::class;
    }
}
