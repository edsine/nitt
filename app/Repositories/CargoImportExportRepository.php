<?php

namespace App\Repositories;

use App\Models\CargoImportExport;
use App\Repositories\BaseRepository;

/**
 * Class CargoImportExportRepository
 * @package App\Repositories
 * @version March 18, 2024, 11:58 am UTC
*/

class CargoImportExportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'port',
        'year',
        'import',
        'export',
        'total_throughput'
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
        return CargoImportExport::class;
    }
}
