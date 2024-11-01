<?php

namespace App\Repositories;

use App\Models\LicenseRenewal;
use App\Repositories\BaseRepository;

/**
 * Class LicenseRenewalRepository
 * @package App\Repositories
 * @version March 18, 2024, 1:24 pm UTC
*/

class LicenseRenewalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'car',
        'van',
        'lorry',
        'mini_bus',
        'big_bus',
        'tanker',
        'trailer',
        'tipper',
        'tractor',
        'state'
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
        return LicenseRenewal::class;
    }
}
