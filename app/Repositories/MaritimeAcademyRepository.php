<?php

namespace App\Repositories;

use App\Models\MaritimeAcademy;
use App\Repositories\BaseRepository;

/**
 * Class MaritimeAcademyRepository
 * @package App\Repositories
 * @version December 5, 2022, 2:08 pm UTC
*/

class MaritimeAcademyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'number_of_staff',
        'number_of_admitted_students',
        'number_of_graduands'
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
        return MaritimeAcademy::class;
    }
}
