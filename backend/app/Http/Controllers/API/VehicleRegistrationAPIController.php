<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVehicleRegistrationAPIRequest;
use App\Http\Requests\API\UpdateVehicleRegistrationAPIRequest;
use App\Models\VehicleRegistration;
use App\Repositories\VehicleRegistrationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VehicleRegistrationResource;
use Response;

/**
 * Class VehicleRegistrationController
 * @package App\Http\Controllers\API
 */

class VehicleRegistrationAPIController extends AppBaseController
{
    /** @var  VehicleRegistrationRepository */
    private $vehicleRegistrationRepository;

    public function __construct(VehicleRegistrationRepository $vehicleRegistrationRepo)
    {
        $this->vehicleRegistrationRepository = $vehicleRegistrationRepo;
    }

    /**
     * Display a listing of the VehicleRegistration.
     * GET|HEAD /vehicleRegistrations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read vehicle registration')) {
            return $this->sendError('Permission Denied', 403);
        }

        $vehicleRegistrations = $this->vehicleRegistrationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VehicleRegistrationResource::collection($vehicleRegistrations), 'Vehicle Registrations retrieved successfully');
    }

    /**
     * Store a newly created VehicleRegistration in storage.
     * POST /vehicleRegistrations
     *
     * @param CreateVehicleRegistrationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVehicleRegistrationAPIRequest $request)
    {
        if (!checkPermission('create vehicle registration')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $vehicleRegistration = $this->vehicleRegistrationRepository->create($input);

        return $this->sendResponse(new VehicleRegistrationResource($vehicleRegistration), 'Vehicle Registration saved successfully');
    }

    /**
     * Display the specified VehicleRegistration.
     * GET|HEAD /vehicleRegistrations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read vehicle registration')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var VehicleRegistration $vehicleRegistration */
        $vehicleRegistration = $this->vehicleRegistrationRepository->find($id);

        if (empty($vehicleRegistration)) {
            return $this->sendError('Vehicle Registration not found');
        }

        return $this->sendResponse(new VehicleRegistrationResource($vehicleRegistration), 'Vehicle Registration retrieved successfully');
    }

    /**
     * Update the specified VehicleRegistration in storage.
     * PUT/PATCH /vehicleRegistrations/{id}
     *
     * @param int $id
     * @param UpdateVehicleRegistrationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehicleRegistrationAPIRequest $request)
    {
        if (!checkPermission('update vehicle registration')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var VehicleRegistration $vehicleRegistration */
        $vehicleRegistration = $this->vehicleRegistrationRepository->find($id);

        if (empty($vehicleRegistration)) {
            return $this->sendError('Vehicle Registration not found');
        }

        $vehicleRegistration = $this->vehicleRegistrationRepository->update($input, $id);

        return $this->sendResponse(new VehicleRegistrationResource($vehicleRegistration), 'VehicleRegistration updated successfully');
    }

    /**
     * Remove the specified VehicleRegistration from storage.
     * DELETE /vehicleRegistrations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete vehicle registration')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var VehicleRegistration $vehicleRegistration */
        $vehicleRegistration = $this->vehicleRegistrationRepository->find($id);

        if (empty($vehicleRegistration)) {
            return $this->sendError('Vehicle Registration not found');
        }

        $vehicleRegistration->delete();

        return $this->sendSuccess('Vehicle Registration deleted successfully');
    }
}
