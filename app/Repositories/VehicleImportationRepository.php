<?php

namespace App\Repositories;

use App\Models\VehicleImportation;
use App\Repositories\BaseRepository;

/**
 * Class VehicleImportationRepository
 * @package App\Repositories
 * @version December 5, 2022, 2:30 pm UTC
*/

class VehicleImportationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'vehicle_category',
        'new_vehicle_count',
        'used_vehicle_count'
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
        return VehicleImportation::class;
    }
}
