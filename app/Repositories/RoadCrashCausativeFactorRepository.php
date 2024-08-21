<?php

namespace App\Repositories;

use App\Models\RoadCrashCausativeFactor;
use App\Repositories\BaseRepository;

/**
 * Class RoadCrashCausativeFactorRepository
 * @package App\Repositories
 * @version March 18, 2024, 12:43 pm UTC
*/

class RoadCrashCausativeFactorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'state',
        'speed_violation',
        'lost_control',
        'dangerous_driving',
        'tyre_burst',
        'brake_failure',
        'wrongful_overtaking',
        'route_violation',
        'mechanically_deficient_vehicle',
        'bad_road',
        'road_obstruction_violation',
        'dangerous_overtaking',
        'overloading',
        'sleeping_on_steering',
        'driving_under_alcohol_drug',
        'use_of_phone_driving',
        'night_journey',
        'fatigue',
        'poor_weather',
        'sign_light_violation',
        'others'
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
        return RoadCrashCausativeFactor::class;
    }
}
