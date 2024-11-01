<?php

namespace App\Repositories;

use App\Models\DriverLicenseProduction;
use App\Repositories\BaseRepository;

/**
 * Class DriverLicenseProductionRepository
 * @package App\Repositories
 * @version March 18, 2024, 12:49 pm UTC
*/

class DriverLicenseProductionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'state',
        'year',
        'value'
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
        return DriverLicenseProduction::class;
    }
}
