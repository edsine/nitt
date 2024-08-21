<?php

namespace App\Repositories;

use App\Models\MaritimeAdministration;
use App\Repositories\BaseRepository;

/**
 * Class MaritimeAdministrationRepository
 * @package App\Repositories
 * @version December 5, 2022, 2:28 pm UTC
*/

class MaritimeAdministrationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'nigerian_sea_fearers_count',
        'foreign_sea_fearers_count',
        'number_of_vessels_registered',
        'number_of_ships_cabotage',
        'number_of_accidents',
        'number_of_piracy_attacks'
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
        return MaritimeAdministration::class;
    }
}
