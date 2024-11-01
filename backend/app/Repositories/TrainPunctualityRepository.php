<?php

namespace App\Repositories;

use App\Models\TrainPunctuality;
use App\Repositories\BaseRepository;

/**
 * Class TrainPunctualityRepository
 * @package App\Repositories
 * @version December 5, 2022, 2:23 pm UTC
*/

class TrainPunctualityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'number_of_train_delay',
        'number_of_late_arrival',
        'number_of_prompt_arrival'
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
        return TrainPunctuality::class;
    }
}
