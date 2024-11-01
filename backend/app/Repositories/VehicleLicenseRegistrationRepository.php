<?php

namespace App\Repositories;

use App\Models\VehicleLicenseRegistration;
use App\Repositories\BaseRepository;

/**
 * Class VehicleLicenseRegistrationRepository
 * @package App\Repositories
 * @version March 18, 2024, 1:21 pm UTC
*/

class VehicleLicenseRegistrationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'state',
        'car',
        'van',
        'lorry',
        'mini_bus',
        'big_bus',
        'tanker',
        'trailer',
        'tipper',
        'tractor'
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
        return VehicleLicenseRegistration::class;
    }
}
