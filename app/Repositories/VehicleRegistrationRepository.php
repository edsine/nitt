<?php

namespace App\Repositories;

use App\Models\VehicleRegistration;
use App\Repositories\BaseRepository;

/**
 * Class VehicleRegistrationRepository
 * @package App\Repositories
 * @version March 18, 2024, 2:05 pm UTC
*/

class VehicleRegistrationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'vehicle_type',
        'private_count',
        'commercial_count',
        'government_count',
        'diplomatic_count',
        'schools_count'
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
        return VehicleRegistration::class;
    }
}
