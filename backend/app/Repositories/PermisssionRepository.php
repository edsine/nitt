<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;
use App\Repositories\BaseRepository;

/**
 * Class PermissionRepository
 * @package App\Repositories
 * @version November 30, 2022, 1:58 pm UTC
*/

class PermissionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Permission::class;
    }

}
