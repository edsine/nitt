<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVehicleLicenseRegistrationAPIRequest;
use App\Http\Requests\API\UpdateVehicleLicenseRegistrationAPIRequest;
use App\Models\VehicleLicenseRegistration;
use App\Repositories\VehicleLicenseRegistrationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VehicleLicenseRegistrationResource;
use Response;

/**
 * Class VehicleLicenseRegistrationController
 * @package App\Http\Controllers\API
 */

class VehicleLicenseRegistrationAPIController extends AppBaseController
{
    /** @var  VehicleLicenseRegistrationRepository */
    private $vehicleLicenseRegistrationRepository;

    public function __construct(VehicleLicenseRegistrationRepository $vehicleLicenseRegistrationRepo)
    {
        $this->vehicleLicenseRegistrationRepository = $vehicleLicenseRegistrationRepo;
    }

    /**
     * Display a listing of the VehicleLicenseRegistration.
     * GET|HEAD /vehicleLicenseRegistrations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read vehicle license registration')) {
            return $this->sendError('Permission Denied', 403);
        }

        $vehicleLicenseRegistrations = $this->vehicleLicenseRegistrationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VehicleLicenseRegistrationResource::collection($vehicleLicenseRegistrations), 'Vehicle License Registrations retrieved successfully');
    }

    /**
     * Store a newly created VehicleLicenseRegistration in storage.
     * POST /vehicleLicenseRegistrations
     *
     * @param CreateVehicleLicenseRegistrationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVehicleLicenseRegistrationAPIRequest $request)
    {
        if (!checkPermission('create vehicle license registration')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $vehicleLicenseRegistration = $this->vehicleLicenseRegistrationRepository->create($input);

        return $this->sendResponse(new VehicleLicenseRegistrationResource($vehicleLicenseRegistration), 'Vehicle License Registration saved successfully');
    }

    /**
     * Display the specified VehicleLicenseRegistration.
     * GET|HEAD /vehicleLicenseRegistrations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read vehicle license registration')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var VehicleLicenseRegistration $vehicleLicenseRegistration */
        $vehicleLicenseRegistration = $this->vehicleLicenseRegistrationRepository->find($id);

        if (empty($vehicleLicenseRegistration)) {
            return $this->sendError('Vehicle License Registration not found');
        }

        return $this->sendResponse(new VehicleLicenseRegistrationResource($vehicleLicenseRegistration), 'Vehicle License Registration retrieved successfully');
    }

    /**
     * Update the specified VehicleLicenseRegistration in storage.
     * PUT/PATCH /vehicleLicenseRegistrations/{id}
     *
     * @param int $id
     * @param UpdateVehicleLicenseRegistrationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehicleLicenseRegistrationAPIRequest $request)
    {
        if (!checkPermission('update vehicle license registration')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var VehicleLicenseRegistration $vehicleLicenseRegistration */
        $vehicleLicenseRegistration = $this->vehicleLicenseRegistrationRepository->find($id);

        if (empty($vehicleLicenseRegistration)) {
            return $this->sendError('Vehicle License Registration not found');
        }

        $vehicleLicenseRegistration = $this->vehicleLicenseRegistrationRepository->update($input, $id);

        return $this->sendResponse(new VehicleLicenseRegistrationResource($vehicleLicenseRegistration), 'VehicleLicenseRegistration updated successfully');
    }

    /**
     * Remove the specified VehicleLicenseRegistration from storage.
     * DELETE /vehicleLicenseRegistrations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete vehicle license registration')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var VehicleLicenseRegistration $vehicleLicenseRegistration */
        $vehicleLicenseRegistration = $this->vehicleLicenseRegistrationRepository->find($id);

        if (empty($vehicleLicenseRegistration)) {
            return $this->sendError('Vehicle License Registration not found');
        }

        $vehicleLicenseRegistration->delete();

        return $this->sendSuccess('Vehicle License Registration deleted successfully');
    }
}
