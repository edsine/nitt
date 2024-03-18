<?php

namespace App\Repositories;

use App\Models\DriverLicenseIssuance;
use App\Repositories\BaseRepository;

/**
 * Class DriverLicenseIssuanceRepository
 * @package App\Repositories
 * @version March 18, 2024, 1:03 pm UTC
*/

class DriverLicenseIssuanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'state',
        'year',
        'male_count',
        'female_count',
        'vehicle_class'
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
        return DriverLicenseIssuance::class;
    }
}
