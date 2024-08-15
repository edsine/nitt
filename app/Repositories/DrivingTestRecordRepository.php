<?php

namespace App\Repositories;

use App\Models\DrivingTestRecord;
use App\Repositories\BaseRepository;

/**
 * Class DrivingTestRecordRepository
 * @package App\Repositories
 * @version March 18, 2024, 2:08 pm UTC
*/

class DrivingTestRecordRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'state',
        'year',
        'renewal_count',
        'fresh_count',
        '3y_count',
        '5y_count',
        'failure',
        'collected',
        'due_for',
        'lp',
        'total_captured'
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
        return DrivingTestRecord::class;
    }
}
