<?php

namespace App\Http\Controllers\API;

use Response;
use Illuminate\Http\Request;
use App\Repositories\PermissionRepository;
use App\Http\Controllers\AppBaseController;

/**
 * Class PermissionAPIController
 * @package App\Http\Controllers\API
 */

class PermissionAPIController extends AppBaseController
{
    /** @var  PermissionRepository */
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepository = $permissionRepo;
    }

    /**
     * Display a listing of the Permission.
     * GET|HEAD /permissions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $permissions = $this->permissionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        )->pluck('name');

        return $this->sendResponse($permissions->toArray(), 'Permissions retrieved successfully');
    }

}
