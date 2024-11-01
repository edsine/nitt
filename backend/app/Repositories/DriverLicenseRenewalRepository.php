<?php

namespace App\Repositories;

use App\Models\DriverLicenseRenewal;
use App\Repositories\BaseRepository;

/**
 * Class DriverLicenseRenewalRepository
 * @package App\Repositories
 * @version March 18, 2024, 1:12 pm UTC
*/

class DriverLicenseRenewalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'state',
        'year',
        'vehicle_class',
        'male_count',
        'female_count'
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
        return DriverLicenseRenewal::class;
    }
}
