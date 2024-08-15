<?php

namespace App\Repositories;

use App\Models\FleetSizeComposition;
use App\Repositories\BaseRepository;

/**
 * Class FleetSizeCompositionRepository
 * @package App\Repositories
 * @version March 18, 2024, 2:15 pm UTC
*/

class FleetSizeCompositionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'state',
        'year',
        '4pc',
        '7pc',
        '10pc',
        '14pc',
        '18pc',
        'coaster',
        'big_bus'
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
        return FleetSizeComposition::class;
    }
}
