<?php

namespace App\Http\Controllers\API;

use Response;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Repositories\RoleRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateRoleAPIRequest;
use App\Http\Requests\API\UpdateRoleAPIRequest;
use App\Http\Resources\RoleResource;

/**
 * Class RoleAPIController
 * @package App\Http\Controllers\API
 */

class RoleAPIController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     * GET|HEAD /roles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read role')) {
            return $this->sendError('Permission Denied', 403);
        }

        $roles = $this->roleRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(RoleResource::collection($roles), 'Roles retrieved successfully');
    }

    /**
     * Store a newly created Role in storage.
     * POST /roles
     *
     * @param CreateRoleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleAPIRequest $request)
    {
        if (!checkPermission('create role')) {
            return $this->sendError('Permission Denied', 403);
        }

        $data = [
            'name' => $request->get('name'),
            'guard_name' => 'web'
        ];

        $role = $this->roleRepository->create($data);
        $role->syncPermissions($request->get('permissions') ?? []);

        return $this->sendResponse($role->toArray(), 'Role saved successfully');
    }

    /**
     * Display the specified Role.
     * GET|HEAD /roles/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read role')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var Role $role */
        $role = $this->roleRepository->find($id);
        $role_permissions = $role->permissions();

        if (empty($role)) {
            return $this->sendError('Role not found');
        }

        return $this->sendResponse(['role' => $role->toArray(), 'permissions' => $role_permissions->toArray()], 'Role retrieved successfully');
    }

    /**
     * Update the specified Role in storage.
     * PUT/PATCH /roles/{id}
     *
     * @param int $id
     * @param UpdateRoleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleAPIRequest $request)
    {
        if (!checkPermission('update role')) {
            return $this->sendError('Permission Denied', 403);
        }

        if ($id == 1) {
            return $this->sendError('Cannot update system role', 403);
        }

        /** @var Role $role */
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            return $this->sendError('Role not found');
        }

        $data = [
            'name' => $request->get('name'),
            'guard_name' => 'web'
        ];

        $role = $this->roleRepository->update($data, $id);
        $role->syncPermissions($request->get('permissions') ?? []);

        return $this->sendResponse($role->toArray(), 'Role updated successfully');
    }

    /**
     * Remove the specified Role from storage.
     * DELETE /roles/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete role')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var Role $role */
        $role = $this->roleRepository->find($id);

        if ($id == 1) {
            return $this->sendError('Cannot delete system role', 403);
        }

        $role_users = $role->users();

        if ($role_users->count() > 0) {
            return $this->sendError('Role is attached to one or more users. It can not be deleted');
        }

        if (empty($role)) {
            return $this->sendError('Role not found');
        }

        $role->delete();

        return $this->sendSuccess('Role deleted successfully');
    }
}
