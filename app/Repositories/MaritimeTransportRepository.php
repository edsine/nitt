<?php

namespace App\Repositories;

use App\Models\MaritimeTransport;
use App\Repositories\BaseRepository;

/**
 * Class MaritimeTransportRepository
 * @package App\Repositories
 * @version December 5, 2022, 2:38 pm UTC
*/

class MaritimeTransportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year',
        'containers_count',
        'general_cargo_count',
        'bulk_cargo_count',
        'tankers_count',
        'containers_import_count',
        'containers_export_count',
        'general_cargo_tonnage',
        'bulk_cargo_tonnage',
        'accidents_recorded'
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
        return MaritimeTransport::class;
    }
}
