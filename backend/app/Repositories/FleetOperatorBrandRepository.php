<?php

namespace App\Repositories;

use App\Models\FleetOperatorBrand;
use App\Repositories\BaseRepository;

/**
 * Class FleetOperatorBrandRepository
 * @package App\Repositories
 * @version March 18, 2024, 2:17 pm UTC
*/

class FleetOperatorBrandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'state',
        'toyota_count',
        'mercedes_count',
        'nissan_count',
        'peugeot_count',
        'volkswagen_count',
        'sharon_count'
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
        return FleetOperatorBrand::class;
    }
}
